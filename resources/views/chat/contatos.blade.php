@extends('chat.chat')

@section('content')
<article class="titulo">
    <h4>Lista de Contatos</h4>
</article>

<article class="contatos">
    @foreach($todos as $usuarios)
        <div class="contato">
            <div class="usuario">
                <div class="foto">
                    <img src="imagens/pinguins.jpg" class="usuario">
                </div>

                <div class="nome">
                    {{$usuarios->user}}<br>
                    <span class="email">{{$usuarios->email}}</span></td>
                </div>
            </div>
        
            <div class="sair">
                <a href="{{route('mensagem', ['id' => $usuarios->id])}}"><img src="imagens/setinha.png" class="setinha"></a>
            </div>
        </div>
    @endforeach
</article>

<a href="{{route('calendar')}}">Voltar</a>
@endsection