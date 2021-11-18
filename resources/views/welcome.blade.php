@extends('layouts.app')




@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-5 mt-5">

            <div class="card bg-dark text-white">

            
                <div class="card-body">

                    <h2 class="text-center pb-3 pt-3">Login</h2>
                        <form method="POST" action="{{ route('login') }}">

                            @csrf


                        <div class="form-group row" >
                            <div class="col-md-1">
                            </div>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Seu E-mail*" name="email" value="{{ old('email') }}" required="" autocomplete="email" autofocus="">
                                @error('email')

                                <span class="invalid-feedback" role="alert">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror
                            </div>

                            <div class="col-md-1">
                            </div>

                        </div>



                        <div class="form-group row">
                            <div class="col-md-1">
                            </div>

                            <div class="col-md-10">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Sua Senha*" name="password" required="" autocomplete="current-password">
                                @error('password')

                                <span class="invalid-feedback" role="alert">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror
                            </div>

                            <div class="col-md-1">
                            </div>

                        </div>



                        <!-- <div class="form-group row">

                            <div class="col-md-6 offset-md-4">

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" >



                                    <label class="form-check-label" for="remember">

                                        Remember Me

                                    </label>

                                </div>

                            </div>

                        </div> -->



                        <div class="form-group row mb-0">
                            <div class="col-md-1">
                            </div>
                           
                            <div class="col-md-10 ">

                                <button type="submit" class="btn btn-primary btn-lg btn-block">

                                    Login

                                </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                         Esqueceu sua senha?
                                         </a>
                            </div>

                            <div class="col-md-1">
                            </div>

                        </div>


                        <div class="form-group row mb-0">

                            <div class="col-md-8 offset-md-4">

                                <button type="submit" class="btn btn-primary">

                                    {{ __('Login') }}

                                </button>



                                @if (Route::has('password.request'))

                                <!--

                                    <a class="btn btn-link" href="{{ route('password.request') }}">

                                        {{ __('Forgot Your Password?') }}

                                    </a>

                                -->

                                @endif

                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection