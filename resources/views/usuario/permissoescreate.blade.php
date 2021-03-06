{{-- @extends('layouts.master') --}}
@extends('adminlte.app')

@section('content')
    
    <div class="content-wrapper">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                 <p>{{ $message }}</p>
            </div>
        @endif
           <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Perfil de Acesso</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


    <div class="card mx-3 mt-3">
    <div class="card-header">
        <div class="row">  
            <div class="col-sm-6">
                Novo perfil de acesso
            </div>
               
            <div class="col-sm-6 text-right">
                <a href="javascript:history.back()"><button type="button" id="voltar" class="btn btn-primary d-print-none">Voltar</button></a>
            
            </div>
        </div>
    </div>
    <form action="/usuarios/permissoes/create" method="POST" class="pt-4">
        @csrf

        <div class="form-group row">
            <div class="col-sm-3">
                <label for="perfil_acesso" class="ml-4">Perfil de Acesso</label>
            </div>
            <div class="col-sm-3">
                <input id="perfil_acesso" type="text"class="form-control @error('perfil_acesso') is-invalid @enderror" name="perfil_acesso" value="{{ old('perfil_acesso') }}" required autocomplete="perfil_acesso" autofocus>
                @error('perfil_acesso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

                
        <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
            <legend class="px-1 ml-5 initialism w-auto"> Usu??rios: </legend>

            <div class="form-group row">
                <div class="col-sm-3 col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exibir_usuario" name="exibir_usuario" value=1>
                        <label class="form-check-label pt-1" for="exibir_usuario">Visualizar Usu??rio</label>
                        </div>
                    
                </div>
                <div class="col-sm-3 col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="criar_usuario" name="criar_usuario" value=1>
                        <label class="form-check-label pt-1" for="criar_usuario">Criar Usu??rio</label>
                        </div>
                    
                    
                </div>
                <div class="col-sm-3 col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="alterar_usuario" name="alterar_usuario" value=1>
                        <label class="form-check-label pt-1" for="alterar_usuario">Alterar Usu??rio</label>
                        </div>
                    
                </div>
                <div class="col-sm-3 col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="excluir_usuario" name="excluir_usuario" value=1>
                        <label class="form-check-label pt-1" for="excluir_usuario">Excluir Usu??rio</label>
                        </div>
                </div>
            </div>
        </fieldset>


        <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
            <legend class="px-1 ml-5 initialism w-auto">Endere??os: </legend>

            <div class="form-group row">
                <div class="col-sm-3 col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exibir_endereco" name="exibir_endereco" value=1>
                        <label class="form-check-label pt-1" for="exibir_endereco">Visualizar Endere??o</label>
                    </div>
                    
                </div>
                <div class="col-sm-3 col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="criar_endereco" name="criar_endereco" value=1>
                        <label class="form-check-label pt-1" for="criar_endereco">Criar Endere??o</label>
                    </div>
                    
                    
                </div>
                
                <div class="col-sm-3 col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="alterar_endereco" name="alterar_endereco" value=1>
                        <label class="form-check-label pt-1" for="alterar_endereco">Alterar Endere??o</label>
                    </div>
                    
                </div>
                
                
                <div class="col-sm-3 col-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="excluir_endereco" name="excluir_endereco" value=1>
                        <label class="form-check-label pt-1" for="excluir_endereco">Excluir Endere??o</label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row pl-3 pr-3 justify-content-center">
            <button  name="action" value="criar" id="criar" type="submit" class="btn btn-primary">Criar</button>     
        </div> 
    </form>
</div>
</div>
@endsection
