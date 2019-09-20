@extends('layouts.calendar')

@section('content')
<meta http-equiv="refresh" content="10">
<section class="dados">
    <br>
    <table class="table col-9">
        <tr>
            <th>Nível</th>
            <th>Comemoração</th>
            <th>Data</th>
        </tr>
        @foreach($feriados as $dados)
        <tr>
            @if($dados->prioridade == 1)
            <td>Prioritário</td>
            @else
            <td>Secundário</td>
            @endif
            <td class="alg-left">{{$dados->data_comemorativa}}</td>
            <td>{{$dados->dia}}/{{$dados->mes}}</td>
        </tr>
        @endforeach
    </table>
</section>
@endsection