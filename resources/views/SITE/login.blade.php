<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>DM2Brasil Representante</title>
  <link rel="stylesheet" href="{{ asset('css/estilo_login.css') }}" />
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form action={{ route('autenticar') }} class="login" method="POST">
                @csrf
            <!-- Div USUARIO -->
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" value="{{ old('usuario') }}" placeholder="Usuário" name="usuario">
                    {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
				</div>
            <!-- Caso a rota informe a variável $erro exibe o erro de login na tela -->
                {{ isset($erro) && $erro != '' ? $erro : '' }}
            <!-- Div SENHA -->
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input name="senha" type="password" value="{{ old('senha') }}" class="login__input" placeholder="Senha">
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}
				</div>
            <!-- Botão ENTRAR -->
				<button type="submit" class="button login__submit">
					<span class="button__text">Entrar</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
			</form>
			
		
		</div>
        <!-- Formas usadas para montar o padrão de findo da Div de LOGIN (Alterar no CSS)-->
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>
	</div>
</div>
<!-- TESTE DE CONEXÃO COM O FIREBIRD (NÃO USAR EM PRODUÇÃO)-->
{{-- 
	<h2><pre>
		@php
			$login = 'teste';
			$senha = 'teste';
			echo DB::table('USUARIOS')->toSQL();
			$usuario = DB::table('USUARIOS')
						->where('login', )
						->where('senha', )->tosql();
			print_r ($usuario);
			$results = DB::select('select nome from usuarios where iduser = 1', array(1));
			print_r ($results);
		@endphp
	</pre></h2> 
--}}
</body>
</html>