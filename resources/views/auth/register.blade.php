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
                        Novo usuário
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="javascript:history.back()"><button type="button" id="voltar" class="btn btn-primary d-print-none">Voltar</button></a>
                    </div>
                </div>
            </div>



        <div class="card-body">

            <form method="POST" action="{{ route('register') }}">

                @csrf



                <div class="form-group row">

                    <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>



                    <div class="col-md-6">

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>



                        @error('name')

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

                </div>



                <div class="form-group row">

                    <label for="franquia_id" class="col-md-4 col-form-label text-md-right">Franquia Primária</label>



                    <div class="col-md-4">

                        <input id="franquia_id" type="text" class="form-control @error('franquia_id') is-invalid @enderror" name="franquia_id" value="@if(!$permissao->criar_franquia) {{ auth()->user()->franquia_id }} @else {{ old('franquia_id') }} @endif" required autocomplete="franquia_id" autofocus readonly >



                        @error('franquia_id')

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

                    @if($permissao->criar_franquia)
                    <div class="col-md-4">

                    <!-- Button trigger modal -->

                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

                           ...

                           </button>

                   </div>
                   @endif

                   

                </div>

                    

                <div class="form-group row">

                    <label for="franquias_id" class="col-md-4 col-form-label text-md-right">Franquias Secundárias</label>



                    <div class="col-md-4">

                        <div class="input-group">
                            <input id="franquias_id" type="text" class="form-control @error('franquias_id') is-invalid @enderror" name="franquias_id" value="" required autocomplete="franquias_id" autofocus readonly >
                            @if($permissao->criar_franquia)
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" title="Adicionar" data-toggle="modal" data-target="#FranquiasModal">...</button>
                                <button type="button" class="btn btn-danger" onclick="funcLimpar()" title="Limpar">×</button>
                            </div>
                            @endif
                            
                            
                        </div>
                        <div class="input-group">
                            <span id="nome_franquias"></span>
                        </div>
                        @error('franquias_id')

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

                    

                   

                </div>



                



                <div class="form-group row">

                    <label for="tipo_usuario_id" class="col-md-4 col-form-label text-md-right">Tipo de Usuário</label>

                    <div class="col-md-6">
{{--                         <select  class="form-control"  name="tipo_usuario" id="tipo_usuario" value="{{ old('tipo_usuario') }}" data-placeholder="Selecione o tipo de usuario">
                            <option value="Operacional">Operacional</option>
                            <option value="Financeiro">Financeiro</option>
                            <option value="Comercial">Comercial</option>
                            <option value="GestorComercial">Gestor Comercial</option>
                            <!-- <option value="Master">Master</option>-->
                         </select>

                        @error('tipo_usuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        
                        <select  class="form-control"  name="tipo_usuario_id" id="tipo_usuario_id" value="{{ old('tipo_usuario_id') }}" data-placeholder="Selecione o tipo de usuario">
                            @foreach ($tipo_usuario as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->perfil_acesso }}</option>
                            @endforeach
                         </select>

                        @error('tipo_usuario_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>


                <div class="form-group row">
                    <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                    <div class="col-md-6">
                        <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" >

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
                        <input id="celular" type="text" class="form-control " name="celular" value="{{ old('celular') }}" required  pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4,5}" >

                        {{-- @error('celular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                </div>

                <div class="form-group row">
                            <label for="comissao" class="col-md-4 col-form-label text-md-right">Comissão (%) </label>
                            <div class="col-md-6">

                                        <input id="comissao" type="number" step="1" value="3" min="0.00" class="form-control @error('comissao') is-invalid @enderror" name="comissao" required autocomplete="comissao" autofocus>
                                        @error('comissao')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                         
                         </div>
                </div>


                <div class="form-group row">

                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>



                    <div class="col-md-6">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">



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

                            Registrar

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>



<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Franquias</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

        <div class="table-responsive">

                            <table id="tabelashow" class="table table-striped table-bordered table-hover">

                                <thead>

                                    <tr>

                                        <th>Nome</th>

                                        <th>Telefone</th>

                                        <th>E-mail</th>

                                        <th>Endereço</th>

                                        <th>Bairro</th>

                                        <th>Cidade</th>

                                        <th>Estado</th>

                                        <th>ID</th>

                                        <th></th>

                                    </tr>

                                </thead>

                                    <tbody>

                                    @foreach ($franquia as $info)

                                        <tr>

                                            <td>{{$info->nome}}</td>

                                            <td>{{$info->telefone}}</td>

                                            <td>{{$info->email }}</td>

                                            <td>{{$info->endereco }}</td>

                                            <td>{{$info->bairro }}</td>

                                            <td>{{$info->cidade }}</td>

                                            <td>{{$info->estado }}</td>

                                            <td>{{$info->id }}</td>

                                           <td><button onclick="document.getElementById('franquia_id').value = {{ $info->id }}" data-dismiss="modal">Selecionar</button></td>

                                            

                                        </tr>

                                    @endforeach

                                    </tbody>

                            </table>

                            

                        </div>

         

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>

          <!--<button type="button" class="btn btn-primary">Save changes</button> -->

        </div>

        

      </div>

    </div>

  </div>

  <div class="modal fade" id="FranquiasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Franquias</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

        <div class="table-responsive">

                            <table id="tabelashow" class="table table-striped table-bordered table-hover">

                                <thead>

                                    <tr>

                                        <th>Nome</th>

                                        <th>Telefone</th>

                                        <th>E-mail</th>

                                        <th>Endereço</th>

                                        <th>Bairro</th>

                                        <th>Cidade</th>

                                        <th>Estado</th>

                                        <th>ID</th>

                                        <th></th>

                                    </tr>

                                </thead>

                                    <tbody>

                                    @foreach ($franquia as $info)

                                        <tr>

                                            <td>{{$info->nome}}</td>

                                            <td>{{$info->telefone}}</td>

                                            <td>{{$info->email }}</td>

                                            <td>{{$info->endereco }}</td>

                                            <td>{{$info->bairro }}</td>

                                            <td>{{$info->cidade }}</td>

                                            <td>{{$info->estado }}</td>

                                            <td>{{$info->id }}</td>

                                            <td><button onclick="addarray({{ $info->id }},'{{ $info->nome}}')" >Selecionar</button></td>

                                            

                                        </tr>

                                    @endforeach

                                    </tbody>

                            </table>

                            

                        </div>

         
         <script>
             var ids  = [];

                function passararray(nome_franquia){
                    var inp = document.getElementById("franquias_id");
                    var nome_franquias = document.getElementById("nome_franquias");
                    inp.value = JSON.stringify(ids);

                    if (nome_franquias.textContent==""){
                        nome_franquias.textContent =  nome_franquia;
                    }else{    
                        nome_franquias.textContent = nome_franquias.textContent +', ' + nome_franquia;
                    }
                }
                function addarray(id,nome_franquia){
                    var sele = id;
                    if (ids.includes(sele)){
                        alert("Franquia já selecionada");
                    } else {
                        ids.push(sele);
                        passararray(nome_franquia);
                    }
                    
                }

               function funcLimpar(){

                var inp = document.getElementById("franquias_id");
                var nome_franquias = document.getElementById("nome_franquias");

                inp.value ="";
                nome_franquias.textContent="";
                ids  = [];

               }

         </script>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>

          <!--<button type="button" class="btn btn-primary">Save changes</button> -->

        </div>

        

      </div>

    </div>

  </div>

  </div>


<script >
    $('#telefone').mask('(99) 9999-9999');
    $('#celular').mask('(99) 99999-9999');
   
 
 </script>

@endsection

