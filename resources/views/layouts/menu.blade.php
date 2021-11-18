@php
  use App\Tipo_Usuario;
  $permissao = Tipo_Usuario::where('id', auth()->user()->tipo_usuario_id)->first();
@endphp



<div class="shadow bg-light rounded-top col-md-2 col-xs-2 col-sm-12 px-0 d-none d-sm-block"  id="collapseExample" style="font-size: 10px;">
    <div style="height: 100vh;">
      <a  href="#"  onclick="oculta_menu()" >
        <div class="py-3 pl-3 bg-secondary text-white">
            ← Menu
          </div>
        </a>
        <div id="menu" class="mt-2 flex-column">
          <div class="card">
            <div class="card-header">
              <a data-toggle="collapse" class="pl-3" href="#cadastros">
              Cadastros
            </a>
          </div>
            <div id="cadastros" class="collapse nav-pills mt-2 @if($active == 'pg2' or $active == 'pg3' or $active == 'pg5' or $active == 'pg6' ) show @endif" data-parent="#menu">
                @if($permissao->exibir_franquia)
                  <a class="pl-4 nav-link @if($active == 'pg2') active @endif" id="lfra1"  href="/franquias" role="tab" aria-controls="v-pills-home" aria-selected="true">Franquias</a>
                @endif
                @if ($permissao->exibir_usuario)
                  <a class="pl-4 nav-link @if($active == 'pg3') active @endif" id="lusu1"  href="/usuarios" role="tab" aria-controls="v-pills-home" aria-selected="true">Usuários</a>  
                @endif
                @if($permissao->exibir_mao_obra)
                  <a class="pl-4 nav-link @if($active == 'pg5') active @endif" id="lmao1" href="/mao_obra" role="tab" aria-controls="v-pills-messages" aria-selected="false">Mão de Obra</a>
                @endif
                @if($permissao->exibir_material)
                  <a class="pl-4 nav-link @if($active == 'pg6') active @endif" id="v-pills-settings-tab"  href="/material" role="tab" aria-controls="v-pills-settings" aria-selected="false">Material</a>
                @endif
            </div>
          </div>

          <div class="card">
            <div class="card-header">
            <a data-toggle="collapse" class="pl-3" href="#operacoes">
              Operações
            </a>
            </div>
            <div id="operacoes" class="collapse nav-pills mt-2 @if($active == 'pg7' or $active == 'pg8') show @endif" data-parent="#menu">
              @if($permissao->exibir_instalacao)
                <a class="pl-4 nav-link @if($active == 'pg7') active @endif" id="v-pills-settings-tab"  href="/instalacoes" role="tab" aria-controls="v-pills-settings" aria-selected="false">Instalações</a>                                     
              @endif
              @if($permissao->exibir_programacao_recurso)
                <a class="pl-4 nav-link @if($active == 'pg8') active @endif" id="v-pills-settings-tab"  href="/programar-recursos" role="tab" aria-controls="v-pills-settings" aria-selected="false">Programar Recursos</a>
              @endif

              @if($permissao->agenda)
                <a class="pl-4 nav-link"  href="/programar-recursos/agenda" role="tab" aria-controls="v-pills-settings" aria-selected="false">Agenda</a>                    
              @endif
            </div>


          </div>

      <div class="card">
            <div class="card-header">
            <a data-toggle="collapse" class="pl-3" href="#comercial">
              Comercial
            </a>
            </div>
            <div id="comercial" class="collapse nav-pills mt-2 @if($active == 'pg14' or $active == 'pg10' or $active == 'pg20' or $active == 'pg21' or $active == 'pg12' or $active == 'pg13') show @endif" data-parent="#menu">

              @if($permissao->exibir_lead)
                <div class="dropdown">
                  <a aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle @if($active == 'pg14') active @endif" id="dropdownMenu3"  href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">Leads</a>
                  <div class="dropdown-menu">

                    <a class="dropdown-item" id="lleads"  href="/leads/filtros" role="tab" aria-controls="v-pills-home" aria-selected="true">Mostrar Leads</a>
                    <a class="dropdown-item" id="lagleads"  href="/leads/agenda" role="tab" aria-controls="v-pills-home" aria-selected="true">Agenda Leads</a>
                    @if($permissao->criar_lead)
                        <a class="dropdown-item" id="novolead"  href="/leads/create" role="tab" aria-controls="v-pills-home" aria-selected="true">Novo Lead</a>

                    @endif
                    @if($permissao->exibir_lead)
                        <a class="dropdown-item" id="relatorio"  href="/leads/relatorio" role="tab" aria-controls="v-pills-home" aria-selected="true">Relatório Leads</a>
                    @endif
                  </div>
                </div>
              @endif

              @if($permissao->exibir_clientes or $permissao->exibir_clientes_franquia or $permissao->exibir_clientes_todos)
              <div class="dropdown">
                <a aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle @if($active == 'pg20') active @endif" id="dropdownMenu3"  href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">Clientes</a>
                <div class="dropdown-menu">

                  <a class="dropdown-item" id="lclientes"  href="/clientes" role="tab" aria-controls="v-pills-home" aria-selected="true">Mostrar Clientes</a>
                  
                  @if($permissao->criar_clientes)
                      <a class="dropdown-item" id="novocliente"  href="/clientes/create" role="tab" aria-controls="v-pills-home" aria-selected="true">Novo Cliente</a>

                  @endif
               
                </div>
              </div>
            @endif     
            
            <div class="dropdown">
              <a aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle @if($active == 'pg10' or $active == 'pg12' or $active == 'pg13') active @endif" id="dropdownMenu3"  href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">Propostas</a>
              <div class="dropdown-menu">
                
  
              @if($permissao->formulario_a)
                       <a class="dropdown-item"  href="/gerador-propostas/grupoa">Simular Grupo A</a>
              @endif
              @if($permissao->formulario_b)
                      <a class="dropdown-item" href="/gerador-propostas/grupob">Simular Grupo B</a>
              @endif
              @if($permissao->propostas_geradas_suas or $permissao->propostas_geradas_franquia or $permissao->propostas_geradas_todas)
                <a class="dropdown-item" href="/propostas-geradas" >Histórico Propostas</a>
              @endif
  
              @if($permissao->exibir_kit)
                <a class="dropdown-item" href="/custo-kits" >Geradores FV</a>
              @endif
            </div>
          </div>
          
            @if($permissao->exibir_vendas or $permissao->exibir_vendas_franquia or $permissao->exibir_vendas_todas)
            <div class="dropdown">
              <a aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle @if($active == 'pg21') active @endif" id="dropdownMenu3"  href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">Vendas</a>
              <div class="dropdown-menu">

                <a class="dropdown-item" id="lvendas"  href="/vendas" role="tab" aria-controls="v-pills-home" aria-selected="true">Mostrar Vendas</a>
                
                @if($permissao->criar_vendas)
                    <a class="dropdown-item" id="novocliente"  href="/vendas/create" role="tab" aria-controls="v-pills-home" aria-selected="true">Nova Venda</a>

                @endif

  
             
              </div>
            </div>
          @endif   

          @if($permissao->alterar_clausula or $permissao->criar_clausula or $permissao->excluir_clausula or $permissao->exibir_clausula or $permissao->exibir_clausula_todas  )
            <a class="pl-4 nav-link @if($active == 'pg22') active @endif" id="lcalcedit"  href="/vendas-contrato" role="tab" aria-controls="v-pills-home" aria-selected="true">Alterar Contrato</a>
         @endif
        </div>
      </div>

          <div class="card">
            <div class="card-header">
            <a data-toggle="collapse" class="pl-3" href="#configuracoes">
              Configurações
            </a>
            </div>
            <div id="configuracoes" class="collapse nav-pills mt-2 @if($active == 'pg11' or $active == 'pg22' or $active == 'pg18' or $active == 'pg19') show @endif" data-parent="#menu">
              @if($permissao->configurar_completude)
                <a class="pl-4 nav-link"  href="/configurar-completude">% Completude</a>
              @endif
              @if($permissao->alterar_parametro_proposta)
                <a class="pl-4 nav-link @if($active == 'pg11') active @endif" id="lcalcedit"  href="/calculadora/edit" role="tab" aria-controls="v-pills-home" aria-selected="true">Parâmetros da Proposta</a>
              @endif

              @if($permissao->alterar_parametro_proposta)
                <a class="pl-4 nav-link @if($active == 'pg18') active @endif" id="lordemtiposervico"  href="/ordem-servico/tipo-servico" role="tab" aria-controls="v-pills-home" aria-selected="true">Tipo de Serviços</a>
              @endif

              @if($permissao->configurar_completude)
                <a class="pl-4 nav-link @if($active == 'pg19') active @endif" id="lconcessionaria"  href="/concessionarias" role="tab" aria-controls="v-pills-home" aria-selected="true">Concessionárias</a>
              @endif

              @if($permissao->exibir_lead_todos)
                <a class="pl-4 nav-link" id="lvallead"  href="/valor-lead" role="tab" aria-controls="v-pills-home" aria-selected="true">Valor Lead</a>
              @endif   

            </div>
          </div>

        @if($permissao->exibir_suporte_franquias or $permissao->responder_suporte_franquias or $permissao->exibir_suporte_sistema or $permissao->responder_suporte_sistema or $permissao->responder_ordem_servico)
          <div class="card">
            <div class="card-header">
            <a data-toggle="collapse" class="pl-3" href="#suporte">
              Suporte
            </a>
            </div>
            <div id="suporte" class="collapse nav-pills mt-2 @if($active == 'pg15' or $active == 'pg16' or $active == 'pg17' ) show @endif" data-parent="#menu">

              
              @if($permissao->exibir_ordem_servico or $permissao->responder_ordem_servico)
              <div class="dropdown">
                <a aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle @if($active == 'pg17') active @endif" id="dropdownMenu3"  href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">Ordem de Serviço</a>
                <div class="dropdown-menu">
                  @if($permissao->exibir_ordem_servico)
                    <a class="dropdown-item" id="msuportesistema"  href="/ordem-servico" role="tab" aria-controls="v-pills-home" aria-selected="true">Mostrar Ordens de Serviço</a>
                  @endif
                  @if($permissao->criar_ordem_servico)
                    <a class="dropdown-item" id="nsuportesistema"  href="/ordem-servico/create" role="tab" aria-controls="v-pills-home" aria-selected="true">Nova Ordem de Serviço</a>
                  @endif
                  @if($permissao->exibir_relatorio_ordem_servico)
                    <a class="dropdown-item" id="rsuportesistema"  href="/ordem-servico/relatorio" role="tab" aria-controls="v-pills-home" aria-selected="true">Relatório</a>
                  @endif
                </div>
              </div>
            @endif
              
              
              @if($permissao->exibir_suporte_franquias or $permissao->responder_suporte_franquias)
                <div class="dropdown">
                  <a aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle @if($active == 'pg15') active @endif" id="dropdownMenu3"  href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">Suporte Franquias</a>
                  <div class="dropdown-menu">
                    @if($permissao->exibir_suporte_franquias)
                      <a class="dropdown-item" id="msuportefranquias"  href="/suporte-franquias" role="tab" aria-controls="v-pills-home" aria-selected="true">Mostrar Chamados</a>
                    @endif
                    @if($permissao->criar_suporte_franquias)
                      <a class="dropdown-item" id="nsuportefranquias"  href="/suporte-franquias/create" role="tab" aria-controls="v-pills-home" aria-selected="true">Novo Chamado</a>
                    @endif
                    @if($permissao->exibir_relatorio_chamados_franquia)
                      <a class="dropdown-item" id="rsuportefranquias"  href="/suporte-franquias/relatorio" role="tab" aria-controls="v-pills-home" aria-selected="true">Relatório</a>
                    @endif
                  </div>
                </div>
              @endif

              @if($permissao->exibir_suporte_sistema or $permissao->responder_suporte_sistema)
                <div class="dropdown">
                  <a aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle @if($active == 'pg16') active @endif" id="dropdownMenu3"  href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">Suporte Sistema</a>
                  <div class="dropdown-menu">
                    @if($permissao->exibir_suporte_sistema)
                      <a class="dropdown-item" id="msuportesistema"  href="/suporte-sistema" role="tab" aria-controls="v-pills-home" aria-selected="true">Mostrar Chamados</a>
                    @endif
                    @if($permissao->criar_suporte_sistema)
                      <a class="dropdown-item" id="nsuportesistema"  href="/suporte-sistema/create" role="tab" aria-controls="v-pills-home" aria-selected="true">Novo Chamado</a>
                    @endif
                    @if($permissao->exibir_relatorio_chamados_sistema)
                      <a class="dropdown-item" id="rsuportesistema"  href="/suporte-sistema/relatorio" role="tab" aria-controls="v-pills-home" aria-selected="true">Relatório</a>
                    @endif
                  </div>
                </div>
              @endif



        </div>
      </div>
        @endif

</div>
    </div>
</div>




<script>
  function oculta_menu(){

  var collapseExample2 = document.getElementById("collapseExample2");
  var collapseExample1 = document.getElementById("collapseExample");
  var principal = document.getElementById("principal");

  collapseExample1.className = "shadow bg-light rounded-top col-md-2 col-xs-2 col-sm-12 px-0 d-none";
  collapseExample2.className = "shadow bg-light rounded-top col-md-1 col-xs-1 col-sm-12 px-0 ";
  principal.className="col-md-12 col-xs-12 col-sm-12 pl-2";
  };

</script>