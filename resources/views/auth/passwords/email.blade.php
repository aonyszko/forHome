
<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="/css/login.css">


</head>
	<body>
		<form method="POST" action="{{ route('password.email') }}"> @csrf
			<div class="box-form">
				<div class="left">
					<div class="overlay">
						<br>
						<br>
						<br>
					<h1>Nova senha</h1>
					</div>
				</div>
			
					<div class="right">
					<h5>ForHome</h5>
					{{-- <p>Novo por aqui? <a href="{{ route('register') }}">Crie sua conta</a>, é rapidinho!</p> --}}
					
					<div class="inputs">
						<input id="email" type="email" placeholder="E-mail cadastrado" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						{{-- <br>
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Senha"> --}}

					</div>
				
					<br><br>

					@if($errors->any())
                    <ul class='alert alert-danger'>
                        @foreach($errors->all() as $error)

                        <div class="center overlay">
                            <h4>
                                {{ $error }}
                            </h4> 
                        </div>

                        @endforeach
                    </ul>
                    @endif
				
					{{-- <div class="remember-me--forget-password">
						<p> Esqueceu sua senha? <a href="{{ route('password.request') }}">Faça uma nova!</a></p>
						<br>
					</div> --}}

						<button type="submit">
							{{ __('Enviar link para redefinição') }}
						</button>
				</div>
			
			</div>
		
		</form>	
	
	</body>
</html>

{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
