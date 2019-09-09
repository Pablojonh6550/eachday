@extends('chat.chat')

@section('content')
<article class="titulo">
    <div class="sair">
        <a href="{{route('index_chat')}}"><img src="../imagens/setinha.png" class="setinha invertida-direita"></a>
    </div>

    <div class="usuario">
        <div class="foto">
            <img src="../imagens/pinguins.jpg" class="usuario">
        </div>

        <div class="nome">
        @foreach($contato as $contato)   
            {{$contato->user}}
        @endforeach
        </div>
    </div>
</article>

<article class="mensagens">
    <!-- <div class="mensagem enviada">
        Olá, tudo bem?
    </div> -->
    
    <div id="fim"></div>
</article>

<article class="titulo">
    <form action="" method="POST">
        <div class="campo-texto">
            <input type="text" name="campo-texto" class="form-control" placeholder="Digite uma mensagem">
        </div>

        <div class="enviar">
            <input type="submit" value="OK" name="btn-digitar" class="btn btn-success">
        <div>
    </form>
</article>
@endsection