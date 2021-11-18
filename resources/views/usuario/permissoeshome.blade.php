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
              <h1 class="m-0">Franquias</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


    <div class="card mx-3 mt-3">

        <div class="card-header d-flex justify-content-between align-items-baseline">
            <div class="col-md-4">
                Tipo de Usuários
            </div>
            <div class="col-md-8 text-right">
             
                <a href="/usuarios/permissoes/create"> <button class="btn btn-primary rounded">Novo Tipo de Usuário</button></a>
                 <a href="javascript:history.back()"><button type="button" id="voltar" class="btn btn-primary d-print-none">Voltar</button></a>
            </div>
           
            
        </div>
        
        
            <div class="pl-4 pb-1">
                <br>
                <div class="table-responsive">
                    <table id="tabelashow" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tipo de Usuário</th>
                                <th style="width: 40px">Editar</th>
                                <th style="width: 40px">Excluir</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($tipos as $tipo)
                                    <tr>
                                        <td>{{$tipo->perfil_acesso}}</td>
                                        <td align="center">
                                            <form method="GET" action="/usuarios/permissoes/{{ $tipo->id }}/edit">
                                                <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-pencil-alt" title="Editar" aria-hidden="true"></i></button>
                                            </form>
        
                                        </td>
                                        <td align="center">
                                                
                                            
                                                <form method="POST" onclick="return confirm('Deseja realmente excluir o perfil de acesso?')" action="/usuarios/permissoes/{{ $tipo->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash" title="Excluir" aria-hidden="true"></i></button>
                                                </form>
 

                                        </td>
                                        
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
 
<!-- Page specific script -->
<script>
    $('#tabelashow1').DataTable( {
        
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
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
    
    } ).buttons().container().appendTo('#tabelashow1_wrapper .col-md-6:eq(0)');
</script>
@endsection
