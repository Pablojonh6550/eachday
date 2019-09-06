@extends('layouts.login')

@section('content')
<div class="tela">
    <a href="{{route('login')}}" class="btn btn-secondary">Login</a>
    <a href="{{route('register')}}" class="btn btn-secondary">Cadastrar</a>
</div>
@endsection