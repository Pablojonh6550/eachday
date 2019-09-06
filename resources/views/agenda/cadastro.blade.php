@extends('layouts.login')  

@section('content') 
<div class="tela">
    <header class="menu">
        <h1>Cadastro</h1>
    </header>
    
    <form action="{{route('adicionar_user')}}" method="post" class="input-group">
    @csrf
        <article class="corpo">
            <div class="iinput-group mb-3">
                <label class="label-local">Usuário:</label>
                <input type="text" class="input-local" id="user" name="user" placeholder="Insira seu nome de usuário">
            </div>  
            
            <div class="iinput-group mb-3">
                <label class="label-local">Email:</label>
                <input type="email" class="input-local" id="email" name="email" placeholder="Insira seu email">
            </div>

            <div class="iinput-group mb-3">
                <label class="label-local">Senha:</label>
                <input type="password" class="input-local" id="password" name="password"  placeholder="Crie uma senha">
            </div>      
        </article>
        
        <article class="corpo">
            <div class="iinput-group mb-3">
                <button type="submit" name="bnt_login" id="bnt_login" class="btn btn-outline-dark btn-lg btn-block">Cadastrar</button>            
            </div>

            <span>
                <p>Já está cadastrado? <a href="{{ route('index_login')}}">Logue-se</a></p>
            </span>
        </article>  
    </form>   
</div> 
@endsection