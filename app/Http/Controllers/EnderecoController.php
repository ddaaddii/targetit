<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Tipo_Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnderecoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validar(array $data)
    {
        $mensagens = [
            'required' => 'O :attribute é obrigatório.',
            'digits' => 'Digite um :attribute válido com :digits dígitos',
            'telefone.digits' => 'Digite um telefone válido, com DDD, de :digits dígitos, somente números (Ex: 2122334455)',
            'celular.digits' => 'Digite um celular válido, com DDD, de :digits dígitos, somente números (Ex: 21999334455)',
            'max' => 'Máximo de caractéres ultrapassado (max: 255).',
        ];

        $regras = [
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string'],
            'bairro' => ['nullable', 'string'],
            'complemento' => ['nullable', 'string'],
            'cep' => ['required', 'string'],
            'user_id' => ['required'],
        ];


        return Validator::make($data, $regras, $mensagens);
    }

    public function index()
    {
        $permissao = new User();
        $permissao->checharPermissao('exibir_endereco');

        $enderecos = Endereco::withTrashed()->get();
        return view('endereco/home', compact('enderecos'));
    }

    public function create()
    {
        $permissao = new User();
        $permissao->checharPermissao('criar_endereco');

        $usuarios = User::all();

        return view('endereco/create', compact('permissao', 'usuarios'));
    }

    public function store(Request $request)
    {
        $permissao = new User();
        $permissao->checharPermissao('criar_endereco');
        $this->validar($request->all())->validate();
        Endereco::create($request->all());

        return redirect('/enderecos')->with('success', 'Endereço registrado com sucesso.');
    }

    public function edit($id)
    {
        $permissao = new User();
        $permissao->checharPermissao('alterar_endereco');
        $usuarios = User::all();
        $endereco = Endereco::withTrashed()->find($id);

        return view('endereco/edit', compact('permissao', 'usuarios', 'endereco'));
    }

    public function update(Request $request, $id)
    {
        $permissao = new User();
        $permissao->checharPermissao('alterar_endereco');

        $endereco = Endereco::withTrashed()->find($id);
        $this->validar($request->all())->validate();

        $data = $request->all();

        $endereco->update($data);

        return redirect('/enderecos')->with('success','Endereço atualizado com sucesso.');

    }

    public function destroy(Endereco $endereco)
    {
        $permissao = new User();
        $permissao->checharPermissao('excluir_endereco');

        $endereco->delete();

        return redirect('/enderecos')->with('success','Endereço excluído com sucesso.');
    }

    public function restaurar($enderecoid)
    {
        $permissao = new User();
        $permissao->checharPermissao('excluir_endereco');
        Endereco::withTrashed()->where('id', $enderecoid)->first()->restore();

        return redirect('/enderecos')->with('success','Endereço reativado com sucesso.');
    }

}
