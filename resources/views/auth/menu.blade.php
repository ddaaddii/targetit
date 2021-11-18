<div class="col-md-3 col-xs-3 col-sm-12">
    <div class="card">
        <div class="card-header">Menu</div>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
                    <a class="nav-link @if($active == 'pg1') active @endif" id="ho"  href="/home" role="tab" aria-controls="v-pills-home" aria-selected="true">Início</a>
                    @cannot('isComercial')
                    @can('isMaster')
                    <a class="nav-link @if($active == 'pg2') active @endif" id="lfra1"  href="/franquias" role="tab" aria-controls="v-pills-home" aria-selected="true">Franquias</a>
                    <a class="nav-link @if($active == 'pg3') active @endif" id="lusu1"  href="/usuarios" role="tab" aria-controls="v-pills-home" aria-selected="true">Usuários</a>
                    @endcan
                    @cannot('isMaster')

                    <div class="dropdown">
                    <a aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" class="nav-link  dropdown-toggle @if($active == 'pg4') active @endif" id="dashboard"  href="/#" role="tab" aria-controls="v-pills-profile" aria-selected="false">Dashboard</a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="/painel-controle">Painel de Controle</a>
                    <a class="dropdown-item" href="/dashboard">Dashboard Operacional</a>
                        @can('isFinanceiro')
                        <a class="dropdown-item" href="/dashboard-financeiro">Dashboard Financeiro</a>
                        @endcan
                      </div>
                    </div>

                    <a class="nav-link @if($active == 'pg5') active @endif" id="lmao1" href="/mao_obra" role="tab" aria-controls="v-pills-messages" aria-selected="false">Mão de Obra</a>
                    <a class="nav-link @if($active == 'pg6') active @endif" id="v-pills-settings-tab"  href="/material" role="tab" aria-controls="v-pills-settings" aria-selected="false">Material</a>
                    <a class="nav-link @if($active == 'pg7') active @endif" id="v-pills-settings-tab"  href="/instalacoes" role="tab" aria-controls="v-pills-settings" aria-selected="false">Instalações</a>
                    
                      
                    <a class="nav-link @if($active == 'pg8') active @endif" id="v-pills-settings-tab"  href="/programar-recursos" role="tab" aria-controls="v-pills-settings" aria-selected="false">Programar Recursos</a>
                    <a class="nav-link @if($active == 'pg10') active @endif" id="v-pills-settings-tab"  href="/programar-recursos/agenda" role="tab" aria-controls="v-pills-settings" aria-selected="false">Agenda</a>
                    
                    @can('isFinanceiro')
                    <div class="dropdown">
                      <a aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle @if($active == 'pg9') active @endif" id="dropdownMenu2"  href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">Configurações</a>
                      <div class="dropdown-menu">
                        
                            <a class="dropdown-item"  href="/configurar-completude">% Completude</a>
                            <a class="dropdown-item" href="/orc-instalacoes">Orçamento de Instalações</a>
                        
                      </div>
                    </div>
                    @endcan
                   
                    @endcannot
                    @endcannot
                    @can('isComercial')
                      <a class="nav-link @if($active == 'pg10') active @endif" id="v-pills-settings-tab"  href="/programar-recursos" role="tab" aria-controls="v-pills-settings" aria-selected="false">Gerador de Propostas</a>
                    @endcan
            </div>
    </div>
</div>