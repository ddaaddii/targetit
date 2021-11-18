@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="row xs-pad-offset-15 row justify-content-center">
            @include('layouts/menu')
            <div id="principal"  class="col-md-10 col-xs-10 col-sm-12 pl-2" style="font-size: 10px">
                @yield('conteudo')
            </div>
        </div>
</div>
@endsection
