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
              <h1 class="m-0">Alterar Senha</h1>
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
                        Alterar Senha
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="javascript:history.back()"><button type="button" id="voltar" class="btn btn-primary d-print-none">Voltar</button></a>
                    </div>
                </div>
            </div>



        <div class="card-body">

            <form method="POST" action="/alterar-senha/{{ $user->id }}/edit" method="POST"">

                @csrf

                @method('PATCH')

                <div class="form-group row">

                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>



                    <div class="col-md-6">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">



                        @error('email')

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

                </div>

                
                <div class="form-group row">

                    <label for="passwordatual" class="col-md-4 col-form-label text-md-right">Senha Atual</label>



                    <div class="col-md-6">

                        <input id="passwordatual" type="password" class="form-control @error('passwordatual') is-invalid @enderror" name="passwordatual" required a>



                        @error('passwordatual')

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

                </div>



                <div class="form-group row">

                    <label for="password" class="col-md-4 col-form-label text-md-right">Nova Senha</label>



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

                    <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirmar a Senha</label>



                    <div class="col-md-6">

                        <input id="confirm_password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" required>

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
 
 <script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Senha não confirmada");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

@endsection

