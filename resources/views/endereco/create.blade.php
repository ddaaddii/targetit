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
              <h1 class="m-0">Endereços</h1>
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
                        Novo Endereço
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="/enderecos"><button type="button" id="voltar" class="btn btn-primary d-print-none">Voltar</button></a>
                    </div>
                </div>
            </div>



        <div class="card-body">

            <form method="POST" action="/enderecos">
                @csrf
                <div class="form-group row">
                    <label for="user_id" class="col-md-4 col-form-label text-md-right">Usuário</label>
                    <div class="col-md-6">
                        <select  class="form-control"  name="user_id" id="user_id"  data-placeholder="Selecione o tipo de usuario">
                            @foreach ($usuarios as $tipo)
                                <option {{ old('user_id') == $tipo->id ? 'selected' : '' }} value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                            @endforeach
                         </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="logradouro" class="col-md-4 col-form-label text-md-right">Logradouro</label>
                    <div class="col-md-6">
                        <input id="logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{ old('logradouro') }}" required autocomplete="logradouro" autofocus>
                        @error('logradouro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="numero" class="col-md-4 col-form-label text-md-right">Número</label>
                    <div class="col-md-6">
                        <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" autofocus>
                        @error('numero')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="bairro" class="col-md-4 col-form-label text-md-right">Bairro</label>
                    <div class="col-md-6">
                        <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro" autofocus>
                        @error('bairro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="complemento" class="col-md-4 col-form-label text-md-right">Complemento</label>
                    <div class="col-md-6">
                        <input id="complemento" type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento" value="{{ old('complemento') }}" autocomplete="complemento">
                        @error('complemento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cep" class="col-md-4 col-form-label text-md-right">Cep</label>
                    <div class="col-md-6">
                        <input id="cep" type="text" class="form-control " name="cep" value="{{ old('cep') }}" required >
                    </div>
                    @error('cep')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Registrar
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

  </div>


<script >
    $('#telefone').mask('(99) 9999-9999');
    $('#celular').mask('(99) 99999-9999');
</script>

@endsection

