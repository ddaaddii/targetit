@extends('layouts.app')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                {{-- <div class="card-header">{{ __('Verify Your Email Address') }}</div> --}}
                <div class="card-header">Verifique seu endereço de e-mail</div>



                <div class="card-body">

                    @if (session('resent'))

                        <div class="alert alert-success" role="alert">

                            {{-- {{ __('A fresh verification link has been sent to your email address.') }} --}}
                            Um novo link de verificação foi enviado para o seu endereço de e-mail.

                        </div>

                    @endif



                    {{-- {{ __('Before proceeding, please check your email for a verification link.') }} --}}
                    Antes de continuar, verifique seu e-mail para obter um link de verificação.

                    {{-- {{ __('If you did not receive the email') }}, --}}
                    Se você não recebeu o e-mail

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">

                        @csrf

                        {{-- <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>. --}}
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aqui para solicitar outro') }}</button>.

                    </form>

                </div>

            </div>

        </div>

    </div>
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</div>

@endsection

