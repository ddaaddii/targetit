@extends('adminlte.app')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="content-wrapper">
           <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Usuários</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


        <div class="card mx-3 mt-3">

            <div class="card-header ">
                <div class="row">
                    <div class="col-md-10">
                        Editar usuário
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="/usuarios"><button type="button" id="voltar" class="btn btn-primary d-print-none">Voltar</button></a>
                    </div>
                </div>
            </div>



        <div class="card-body">

            <form method="POST" action="/usuarios/{{ $user->id }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name ?? '') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>
                    <div class="col-md-6">
                        <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf', $user->cpf ?? '') }}" required autocomplete="cpf" autofocus>
                        @error('cpf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipos_usuarios_id" class="col-md-4 col-form-label text-md-right">Tipo de Usuário</label>
                    <div class="col-md-6">
                        <select  class="form-control"  name="tipos_usuarios_id" id="tipos_usuarios_id" value="{{ old('tipos_usuarios_id') }}" data-placeholder="Selecione o tipo de usuario">
                            @foreach ($tipos_usuarios as $tipo)
                                <option @if (old('tipos_usuarios_id', $user->tipos_usuarios_id) == $tipo->id) selected  @endif value={{ $tipo->id }}>{{ $tipo->perfil_acesso }}</option>
                            @endforeach    
                        </select>

                        @error('tipos_usuarios_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                    <div class="col-md-6">
                        <input id="telefone" type="tel" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone', $user->telefone ) }}" required autocomplete="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" >

                        @error('telefone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="celular" class="col-md-4 col-form-label text-md-right">Celular</label>

                    <div class="col-md-6">
                        <input id="celular" type="tel" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular', $user->celular ) }}" required autocomplete="celular" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4,5}" >

                        @error('celular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar a Senha</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Atualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  </div>
  <script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    $("#celular").mask("(00) 00000-0000");
 </script>

@endsection

