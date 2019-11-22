@extends('layouts.login')  

@section('content') 
<div class="tela">
    <header class="menu">
        <h1>Cadastro</h1>
    </header>
    
    <form action="{{route('register')}}" method="post" class="input-group">
    @csrf
        <article class="corpo">
            <div class="iinput-group mb-3">
                <label class="label-local">Usuário:</label>
                <input type="text" class="input-local form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Insira seu nome de usuário" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>  
            
            <div class="iinput-group mb-3">
                <label class="label-local">Email:</label>
                <input type="email" class="input-local form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Insira seu email" value="{{ old('email') }}" required>
            
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="iinput-group mb-3">
                <label class="label-local">Senha:</label>
                <input type="password" class="input-local input-local form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password"  placeholder="Crie uma senha" value="{{ old('password') }}" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

             <div class="iinput-group mb-3">
                <label class="label-local">Confirmar Senha:</label>
                <input type="password" class="input-local input-local form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation"  placeholder="Confirme uma senha" value="{{ old('password_confirmation') }}" required>

                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>      
        </article>
        
        <article class="corpo">
            <div class="iinput-group mb-3">
                <button type="submit" name="bnt_login" id="bnt_login" class="btn btn-dark btn-lg btn-block">Cadastrar</button>            
            </div>

            <span>
                <p>Já está cadastrado? <a href="{{ route('index')}}">Logue-se</a></p>
            </span>
        </article>  
    </form>   
</div> 
@endsection