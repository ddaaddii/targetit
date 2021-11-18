@extends('adminlte.app')

@section('content')
   
    <div class="content-wrapper">
           <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Bem Vindo</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
      @endif

 <div class="card mx-3 mt-3">
    <div class="card-header pb-3 pt-3">
      Home

    </div>
    

  
  
          
  
    
    </div><!-- /.card -->

  


   

    
            
 
</div>







@endsection


