
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="/css/login.css">

</head>
	<body>
		<form method="POST" action="{{ route('register') }}"> @csrf
			<div class="box-form">
				<div class="left">
					<div class="overlay">
						<br>
						<br>
						<br>
					<h1>Crie sua conta!</h1>
					</div>
				</div>
			
					<div class="right">
					<h5>ForHome</h5>
					{{-- <p>Novo por aqui? <a href="{{ route('register') }}">Faça sua conta</a>, é rapidinho!</p> --}}
					
					<div class="inputs">
						<input id="name" type="text" placeholder="Nome" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
						<br>
						<input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <br>
                        <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <br>
                        <input id="password-confirm" type="password" placeholder="Confirme sua senha" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
							{{ __('Criar') }}
						</button>
				</div>
			
			</div>
		
		</form>	
	
	</body>
</html>

