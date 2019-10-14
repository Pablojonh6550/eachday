@extends('layouts.calendar')

@section('content')
<section class="dados">
    <!-- Voltar a página anterior -->
    @if($_SERVER ['REQUEST_URI'] == "/calendario/dia")
        <a href="{{route('calendar')}}" class="voltar">
    @elseif($_SERVER ['REQUEST_URI'] == "/calendario/tarefa")
        <a href="{{route('entrar')}}" class="voltar">
    @endif
        <img src="../storage/ikons/32/circle_left_red.png" id="imgvolt" >
    </a>
    
    @yield('atividades')
</section>
@endsection