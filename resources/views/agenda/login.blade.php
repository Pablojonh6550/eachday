@extends('layouts.login')  

@section('content') 
<div class="tela">
    <header class="menu">
        <h1>Login</h1>
    </header>
    
    <form action="{{route('consultar_user')}}" method="post" class="input-group">
	@csrf
		<article class="corpo">
			<div class="iinput-group mb-3">
				<label class="label-local">Email:</label>
				<input type="email" class="input-local form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Insira seu email" value="{{ old('email') }}" required autofocus>
			</div>

			<div class="iinput-group mb-3">
				<label class="label-local">Senha:</label>
				<input type="password" class="input-local" id="password" name="password"  placeholder="Insira sua senha">
			</div>
		</article>
		
		<article class="corpo">
			<div class="iinput-group mb-3">
				<button type="submit" name="bnt_login" id="bnt_login" class="btn btn-outline-dark btn-lg btn-block">Logar</button>            
			</div>

			<span>
				<p>Não está cadastrado? <a href="{{route('create')}}">Cadastre-se</a></p>
			</span>
		</article>  
    </form> 
</div>  
@endsection