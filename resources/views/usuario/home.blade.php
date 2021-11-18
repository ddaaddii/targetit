@extends('adminlte.app')

@section('content')
    
    <div class="content-wrapper pb-3">
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
              <h1 class="m-0">Usuários</h1>
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
                <div class="col-md-4">
                    Usuários Cadastrados
                </div>
                <div class="col-md-8 text-right">
                    <a href="/usuarios/create"> <button class="btn btn-primary rounded">Novo Usuário</button></a>
                     <a href="/usuarios/permissoes"> <button class="btn btn-primary rounded">Perfis de Acesso</button></a>
                </div>
            </div>
            
           
        </div>
        
        
            <div class="px-3 pb-3">
                <br>
                <div class="table-responsive">
                    <table id="tabelashow" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 40px">Editar</th>
                                <th style="width: 40px">Excluir</th>
                                <th><div style="width: 100px;">Nome</div></th>
                                <th><div style="width: 150px;">Perfil de acesso</div></th>
                                <th><div style="width: 100px;">E-mail</div></th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($usuario as $pessoa)
                                    <tr>
                                        <td align="center">
                                            <form method="GET" action="/usuarios/{{ $pessoa->id }}/edit">
                                                <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-pencil-alt" title="Editar" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                        <td align="center">
                                            @if($pessoa->id != auth()->user()->id)
                                                @if($pessoa->deleted_at)
                                                    <form method="POST" onclick="return confirm('Deseja reativar o usuário?')" action="/usuarios/{{ $pessoa->id }}/restaurar">
                                                        @csrf
                                                        <button class="btn btn-info btn-sm" type="submit">
                                                            <i class="fas fa-user-check" title="Ativar"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" onclick="return confirm('Deseja desativar o usuário?')" action="/usuarios/{{ $pessoa->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit">
                                                            <i class="fa fa-trash" title="Excluir" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{$pessoa->name}}</td>
                                        <td>{{$pessoa->perfil_acesso }}</td>
                                        <td>{{$pessoa->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>


<!-- DataTables  & Plugins -->
<script src={{ asset('/plugins/datatables/jquery.dataTables.min.js') }}></script>
<script src={{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
<script src={{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
<script src={{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
<script src={{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
<script src={{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>
<script src={{ asset('/plugins/jszip/jszip.min.js') }}></script>
<script src={{ asset('/plugins/pdfmake/pdfmake.min.js') }}></script>
<script src={{ asset('/plugins/pdfmake/vfs_fonts.js') }}></script>
<script src={{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js') }}></script>
<script src={{ asset('/plugins/datatables-buttons/js/buttons.print.min.js') }}></script>
<script src={{ asset('/plugins/datatables-buttons/js/buttons.colVis.min.js') }}></script>
 
  
    <script>

       $('#tabelashow').DataTable( {
        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
          "order": [[ 2, "asc" ]],
          "buttons": [ "csv", "excel", "pdf", {"extend":"print","text":"Imprimir"}, {"extend":"colvis","text":"Colunas"}],
          "lengthMenu": [[8, 10, 25, 50, -1], [8, 10, 25, 50, "All"]],
                    "bJQueryUI": true,
                    "oLanguage": {
                        "sProcessing":   "Processando...",
                        "sLengthMenu":   "Registros _MENU_ ",
                        "sZeroRecords":  "Não foram encontrados resultados",
                        "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                        "sInfoFiltered": "",
                        "sInfoPostFix":  "",
                        "sSearch":       "Buscar:",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "Primeiro",
                            "sPrevious": "Anterior",
                            "sNext":     "Seguinte",
                            "sLast":     "Último"
                        }
                    }
    
    } ).buttons().container().appendTo('#tabelashow_wrapper .col-md-6:eq(0)');
    
    </script>

@endsection
