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
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card mx-3 mt-3">
        <div class="card-header">
            <div class="row">  
                <div class="col-sm-6">
                    Editar perfil de acesso
                </div>
                
                <div class="col-sm-6 text-right">
                    <a href="javascript:history.back()"><button type="button" id="voltar" class="btn btn-primary d-print-none">Voltar</button></a>
                </div>
            </div>
        </div>
        <form action="/usuarios/permissoes/{{ $tipo_usuario->id }}" method="POST" class="pt-4">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="perfil_acesso" class="ml-4">Perfil de Acesso</label>
                </div>
                <div class="col-sm-3">
                    <input id="perfil_acesso" type="text"class="form-control @error('perfil_acesso') is-invalid @enderror" name="perfil_acesso" value="{{ old('perfil_acesso',  $tipo_usuario->perfil_acesso) }}" required autocomplete="perfil_acesso" autofocus>
                    @error('perfil_acesso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

                

            <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                <legend class="px-1 ml-5 initialism w-auto"> Usuários: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="hidden" name="exibir_usuario" value="0">
                            <input type="checkbox" class="form-check-input" id="exibir_usuario" name="exibir_usuario" @if (old('exibir_usuario', $tipo_usuario->exibir_usuario) == 1) checked  @endif value=1>
                            <label class="form-check-label pt-1" for="exibir_usuario">Visualizar Usuário</label>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="hidden" name="criar_usuario" value="0">
                            <input type="checkbox" class="form-check-input" id="criar_usuario" name="criar_usuario" @if (old('criar_usuario', $tipo_usuario->criar_usuario) == 1) checked  @endif value=1>
                            <label class="form-check-label pt-1" for="criar_usuario">Criar Usuário</label>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="hidden" name="alterar_usuario" value="0">
                            <input type="checkbox" class="form-check-input" id="alterar_usuario" name="alterar_usuario"  @if (old('alterar_usuario', $tipo_usuario->alterar_usuario) == 1) checked  @endif value=1>
                            <label class="form-check-label pt-1" for="alterar_usuario">Alterar Usuário</label>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="hidden" name="excluir_usuario" value="0">
                            <input type="checkbox" class="form-check-input" id="excluir_usuario" name="excluir_usuario" @if (old('excluir_usuario', $tipo_usuario->excluir_usuario) == 1) checked  @endif value=1>
                            <label class="form-check-label pt-1" for="excluir_usuario">Excluir Usuário</label>
                        </div>
                    </div>
                </div>
            </fieldset>


            <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                <legend class="px-1 ml-5 initialism w-auto">Endereço: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="hidden" name="exibir_endereco" value="0">
                            <input type="checkbox" class="form-check-input" id="exibir_endereco" name="exibir_endereco"  @if (old('exibir_endereco', $tipo_usuario->exibir_endereco) == 1) checked  @endif   value=1>
                            <label class="form-check-label pt-1" for="exibir_endereco">Visualizar Endereço</label>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="hidden" name="criar_endereco" value="0">
                            <input type="checkbox" class="form-check-input" id="criar_endereco" name="criar_endereco" @if (old('criar_endereco', $tipo_usuario->criar_endereco) == 1) checked  @endif  value=1>
                            <label class="form-check-label pt-1" for="criar_endereco">Criar Endereço</label>
                        </div>
                    </div>
                    
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="hidden" name="alterar_endereco" value="0">
                            <input type="checkbox" class="form-check-input" id="alterar_endereco" name="alterar_endereco"  @if (old('alterar_endereco', $tipo_usuario->alterar_endereco) == 1) checked  @endif value=1>
                            <label class="form-check-label pt-1" for="alterar_endereco">Alterar Endereço </label>
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="hidden" name="excluir_endereco" value="0">
                            <input type="checkbox" class="form-check-input" id="excluir_endereco" name="excluir_endereco"   @if (old('excluir_endereco', $tipo_usuario->excluir_endereco) == 1) checked  @endif value=1>
                            <label class="form-check-label pt-1" for="excluir_endereco">Excluir Endereço</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="form-group row pl-3 pr-3 justify-content-center">
                <button  name="action" value="criar" id="criar" type="submit" class="btn btn-primary">Editar</button>     
            </div> 
        </form>
    </div>
</div>
@endsection
