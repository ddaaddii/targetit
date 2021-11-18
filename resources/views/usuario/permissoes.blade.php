@extends('layouts.master')

@section('conteudo')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card">
    <div class="card-header">
        <div class="row">  
            <div class="col-sm-3">
                Novo perfil de acesso
            </div>
            <div class="col-sm-3">
                
            </div>
            <div class="col-sm-3">
               
            </div>
            
            <div class="col-sm-3">
            
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
                        <div class="col-sm-6">
                          
                        </div>
                </div>

                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Franquias: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exibir_franquia" name="exibir_franquia" value=1>
                            <label class="form-check-label pt-1" for="exibir_franquia">Visualizar Franquia</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="criar_franquia" name="criar_franquia" value=1>
                            <label class="form-check-label pt-1" for="criar_franquia">Criar Franquia</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="alterar_franquia" name="alterar_franquia" value=1>
                            <label class="form-check-label pt-1" for="alterar_franquia">Alterar Franquia</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="excluir_franquia" name="excluir_franquia" value=1>
                            <label class="form-check-label pt-1" for="excluir_franquia">Excluir Franquia</label>
                          </div>
                        
                    </div>
                </div>
                </fieldset>

                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Usuários: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exibir_usuario" name="exibir_usuario" value=1>
                            <label class="form-check-label pt-1" for="exibir_usuario">Visualizar Usuário</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="criar_usuario" name="criar_usuario" value=1>
                            <label class="form-check-label pt-1" for="criar_usuario">Criar Usuário</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="alterar_usuario" name="alterar_usuario" value=1>
                            <label class="form-check-label pt-1" for="alterar_usuario">Alterar Usuário</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="excluir_usuario" name="excluir_usuario" value=1>
                            <label class="form-check-label pt-1" for="excluir_usuario">Excluir Usuário</label>
                          </div>
                        
                    </div>
                </div>
                </fieldset>


                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Alterar Parâmetros das Propostas: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="alterar_parametro_proposta" name="alterar_parametro_proposta" value=1>
                            <label class="form-check-label pt-1" for="alterar_parametro_proposta">Alterar Parâmetros das Propostas</label>
                          </div>
                        
                    </div>
                    
                </div>
                </fieldset>


                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Leads: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exibir_lead" name="exibir_lead" value=1>
                            <label class="form-check-label pt-1" for="exibir_lead">Visualizar Leads</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="criar_lead" name="criar_lead" value=1>
                            <label class="form-check-label pt-1" for="criar_lead">Criar Leads</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="alterar_lead" name="alterar_lead" value=1>
                            <label class="form-check-label pt-1" for="alterar_lead">Alterar Leads</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="excluir_lead" name="excluir_lead" value=1>
                            <label class="form-check-label pt-1" for="excluir_lead">Excluir Leads</label>
                          </div>
                        
                    </div>
                </div>
                </fieldset>
                



                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Gerador de Propostas: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formulario_a" name="formulario_a" value=1>
                            <label class="form-check-label pt-1" for="formulario_a">Gerar Proposta Grupo A</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formulario_b" name="formulario_b" value=1>
                            <label class="form-check-label pt-1" for="formulario_b">Gerar Proposta Grupo B</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="campos_especiais" name="campos_especiais" value=1>
                            <label class="form-check-label pt-1" for="campos_especiais">Campos Especiais da Proposta</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="calculadora" name="calculadora" value=1>
                            <label class="form-check-label pt-1" for="calculadora">Simular Preço (calculadora)</label>
                          </div>
                        
                    </div>
                </div>
                </fieldset>



                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Propostas Geradas: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="propostas_geradas_suas" name="propostas_geradas_suas" value=1>
                            <label class="form-check-label pt-1" for="propostas_geradas_suas">Visualizar suas propostas geradas</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="propostas_geradas_franquia" name="propostas_geradas_franquia" value=1>
                            <label class="form-check-label pt-1" for="propostas_geradas_franquia">Visualizar propostas geradas da sua franquia</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="propostas_geradas_todas" name="propostas_geradas_todas" value=1>
                            <label class="form-check-label pt-1" for="propostas_geradas_todas">Visualizar todas propostas geradas</label>
                          </div>
                        
                    </div>
                    
                </div>
                </fieldset>


                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Kits: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exibir_kit" name="exibir_kit" value=1>
                            <label class="form-check-label pt-1" for="exibir_kit">Visualizar kits</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="criar_kit" name="criar_kit" value=1>
                            <label class="form-check-label pt-1" for="criar_kit">Criar kits</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="alterar_kit" name="alterar_kit" value=1>
                            <label class="form-check-label pt-1" for="alterar_kit">Alterar kits</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="excluir_kit" name="excluir_kit" value=1>
                            <label class="form-check-label pt-1" for="excluir_kit">Excluir kits</label>
                          </div>
                        
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="precificar_kit" name="precificar_kit" value=1>
                            <label class="form-check-label pt-1" for="precificar_kit">Precificar</label>
                          </div>
                        
                    </div>
                </div>
                
                </fieldset>



                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Dashboard: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dashboard_painel" name="dashboard_painel" value=1>
                            <label class="form-check-label pt-1" for="dashboard_painel">Painel de Controle</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dashboard_operacional" name="dashboard_operacional" value=1>
                            <label class="form-check-label pt-1" for="dashboard_operacional">Dashboard Operacional</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dashboard_financeiro" name="dashboard_financeiro" value=1>
                            <label class="form-check-label pt-1" for="dashboard_financeiro">Dashboard Financeiro</label>
                          </div>
                        
                    </div>

                </div>
                </fieldset>

                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Mão de Obra: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exibir_mao_obra" name="exibir_mao_obra" value=1>
                            <label class="form-check-label pt-1" for="exibir_mao_obra">Visualizar Mão de obra</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="criar_mao_obra" name="criar_mao_obra" value=1>
                            <label class="form-check-label pt-1" for="criar_mao_obra">Criar Mão de Obra</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="alterar_mao_obra" name="alterar_mao_obra" value=1>
                            <label class="form-check-label pt-1" for="alterar_mao_obra">Alterar Mão de obra</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="excluir_mao_obra" name="excluir_mao_obra" value=1>
                            <label class="form-check-label pt-1" for="excluir_mao_obra">Excluir Mão de obra</label>
                          </div>
                        
                    </div>
                </div>
                </fieldset>


                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Material: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exibir_material" name="exibir_material" value=1>
                            <label class="form-check-label pt-1" for="exibir_material">Visualizar Material</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="criar_material" name="criar_material" value=1>
                            <label class="form-check-label pt-1" for="criar_material">Criar Material</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="alterar_material" name="alterar_material" value=1>
                            <label class="form-check-label pt-1" for="alterar_material">Alterar Materials/label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="excluir_material" name="excluir_material" value=1>
                            <label class="form-check-label pt-1" for="excluir_material">Excluir Material</label>
                          </div>
                        
                    </div>
                </div>
                </fieldset>


                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Instalação: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exibir_instalacao" name="exibir_instalacao" value=1>
                            <label class="form-check-label pt-1" for="exibir_instalacao">Visualizar Instalações</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="criar_instalacao" name="criar_instalacao" value=1>
                            <label class="form-check-label pt-1" for="criar_instalacao">Criar Instalações</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="alterar_instalacao" name="alterar_instalacao" value=1>
                            <label class="form-check-label pt-1" for="alterar_instalacao">Alterar Instalações</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="excluir_instalacao" name="excluir_instalacao" value=1>
                            <label class="form-check-label pt-1" for="excluir_instalacao">Excluir Instalações</label>
                          </div>
                        
                    </div>
                </div>
                </fieldset>


                <fieldset class="border border-left-0 border-right-0 border-bottom-0 border-solid m-4">
                    <legend class="px-1 ml-5 initialism w-auto"> Programação de Recursos: </legend>

                <div class="form-group row">
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exibir_programacao_recurso" name="exibir_programacao_recurso" value=1>
                            <label class="form-check-label pt-1" for="exibir_programacao_recurso">Visualizar Programação de Recursos</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="criar_programacao_recurso" name="criar_programacao_recurso" value=1>
                            <label class="form-check-label pt-1" for="criar_programacao_recurso">Criar Programação de Recursos</label>
                          </div>
                        
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="agenda" name="agenda" value=1>
                            <label class="form-check-label pt-1" for="agenda">Consultar Agenda</label>
                          </div>
                        
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="configurar_completude" name="configurar_completude" value=1>
                            <label class="form-check-label pt-1" for="configurar_completude">Configurar Completude</label>
                          </div>
                        
                    </div>
                </div>
                </fieldset>

                <div class="form-group row pl-3 pr-3 justify-content-center">
                    <button  name="action" value="criar" id="criar" type="submit" class="btn btn-primary">Criar</button>     
                </div> 
    </form>
</div>
@endsection
