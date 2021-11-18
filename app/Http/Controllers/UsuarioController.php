<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validar(array $data, $user = false)
    {
        $mensagens = [
            'required' => 'O :attribute é obrigatório.',
            'digits' => 'Digite um :attribute válido com :digits dígitos',
            'telefone.digits' => 'Digite um telefone válido, com DDD, de :digits dígitos, somente números (Ex: 2122334455)',
            'celular.digits' => 'Digite um celular válido, com DDD, de :digits dígitos, somente números (Ex: 21999334455)',
            'email.email' => 'Digite um email válido.',
            'email.unique' => 'Esse e-mail já foi escolhido.',
            'email.max' => 'Máximo de caractéres ultrapassado (max: 255).',
            'password.min' => 'Senha com poucos caractéres (min: 6).',
            'password.confirmed' => 'A confirmação não é igual a senha.',
        ];

        $regras = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'telefone' => ['nullable'],
            'celular' => ['nullable'],
            'cpf' => ['nullable'],
            'tipos_usuarios_id' => ['required'],
        ];

        if(isset($data['_method']) && $data['_method'] === 'PATCH'){
            $regras['email'] =  ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id];
        }

        return Validator::make($data, $regras, $mensagens);
    }

    public function index()
    {
        $permissao = new User();
        $permissao->checharPermissao('exibir_usuario');

        $usuario = DB::table('users')
        ->join('tipos_usuarios', 'users.tipos_usuarios_id','=', 'tipos_usuarios.id')
        ->select('users.*',  'tipos_usuarios.perfil_acesso')
        ->get();

        return view('usuario/home', [
            'usuario' => $usuario,
        ]);
    }

    public function create()
    {
        $permissao = new User();
        $permissao->checharPermissao('criar_usuario');
        $tipos_usuarios = Tipo_Usuario::all();

        return view('usuario/create', compact('tipos_usuarios'));
    }



    public function store(Request $request)
    {
        $permissao = new User();
        $permissao->checharPermissao('criar_usuario');
        $this->validar($request->all())->validate();

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect('/usuarios')->with('success', 'Usuário registrado com sucesso.');
    }

    public function edit($id)
    {
        $permissao = new User();
        $permissao->checharPermissao('alterar_usuario');
        $tipos_usuarios = Tipo_Usuario::all();
        $user = User::withTrashed()->find($id);

        return view('usuario/edit', compact('user', 'permissao', 'tipos_usuarios'));
    }

    public function update(Request $request, $id)
    {
        $permissao = new User();
        $permissao->checharPermissao('alterar_usuario');
        
        $user = User::withTrashed()->find($id);
        $this->validar($request->all(), $user)->validate();

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        return redirect('/usuarios')->with('success','Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $permissao = new User();
        $permissao->checharPermissao('excluir_usuario');

        if ($user->id == auth()->user()->id){
            abort(403, "Você não tem permissão para realizar essa ação.");
        }

        $user->delete();

        return redirect('/usuarios')->with('success','Usuario excluído com sucesso.');
    }

    public function restaurar($userid)
    {
        $permissao = new User();
        $permissao->checharPermissao('excluir_usuario');
        User::withTrashed()->where('id', $userid)->first()->restore();

        return redirect('/usuarios')->with('success','Usuario reativado com sucesso.');
    }


    // Permissões

    public function permissoes_index()
    {
        $permissao = new User();
        $permissao->checharPermissao('criar_usuario');

        $tipos = Tipo_Usuario::all();

        return view('usuario/permissoeshome', compact('tipos'));
    }


    public function permissoes_create()
    {
        $permissao = new User();
        $permissao->checharPermissao('criar_usuario');


        return view('usuario/permissoescreate', compact('permissao'));

    }

    public function permissoes_store(Request $request)
    {
        $permissao = new User();
        $permissao->checharPermissao('criar_usuario');
        $data = $request->all();
        $tipo_usuario = new Tipo_Usuario();
        $tipo_usuario->create($data);

        return redirect('/usuarios/permissoes')->with('success','Permissão criada');

    }

    public function permissoes_edit(Tipo_Usuario $tipo_usuario)
    {
        $permissao = new User();
        $permissao->checharPermissao('criar_usuario');

        return view('usuario/permissoesedit', compact('permissao', 'tipo_usuario'));
    }

    public function permissoes_update(Request $request, Tipo_Usuario $tipo_usuario)
    {
        $permissao = new User();
        $permissao->checharPermissao('criar_usuario');
        $tipo_usuario->update($request->all());
 
        return redirect('/usuarios/permissoes')->with('success','Perfil atualizado');
    }

    public function permissoes_destroy(Tipo_Usuario $tipo_usuario)
    {
        $permissao = new User();
        $permissao->checharPermissao('excluir_usuario');
        $tipo_usuario->delete();

        return redirect('/usuarios/permissoes')->with('success','Perfil excluído');
    }

}
