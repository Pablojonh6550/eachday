@extends('chat.chat')

@section('content')
@foreach($contato as $contato)   
    @php($id = $contato->id)
    @php($user = $contato->user)
@endforeach
<article class="titulo">
    <div class="sair">
        <a href="{{route('index_chat')}}"><img src="../imagens/setinha.png" class="setinha invertida-direita"></a>
    </div>

    <div class="usuario">
        <div class="foto">
            <img src="../imagens/pinguins.jpg" class="usuario">
        </div>

        <div class="nome">
            {{$user}}
        </div>
    </div>
</article>

<article class="mensagens">
    @foreach($mensagens as $msg)
        @if($msg->user != $id)
            <div class="mensagem enviada">
        @else
            <div class="mensagem recebida">
        @endif
        {{$msg->mensagens}}
        </div>
    @endforeach

    <div id="fim"></div>
</article>

<article class="titulo">
    <form action="{{route('add_mensagem')}}" method="POST">
        @csrf
        <div class="campo-texto">
            <input type="hidden" name="receptor" value="{{$id}}">
            <input type="text" name="campotexto" class="form-control" placeholder="Digite uma mensagem">
        </div>

        <div class="enviar">
            <input type="submit" value="OK" name="btn-digitar" class="btn btn-success">
        <div>
    </form>
</article>
@endsection