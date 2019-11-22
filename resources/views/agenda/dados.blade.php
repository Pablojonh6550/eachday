@extends('layouts.atividades')  

@section('atividades') 
<div class="tabelaatividade">
     <table class="table">
     <tr>
          <td colspan="4" class="data bolder">{{ $data }}</td>
          <td colspan="2" class="adicionar"><a href="{{route('tarefa')}}" class="adicionar bolder"><img src="../storage/ikons/32/circle_plus_blue.png" onmouseover="mouseOver(this, 'circle_plus_blue_all')" onmouseout="mouseOut(this, 'circle_plus_blue')"> CRIAR</a></td>
     </tr>
     
     <th colspan='3'>Atividade</th>
     <th>Status</th>
     <th colspan='2'>Ações</th>

     @if(count($atividade) > 0)
          @php ($i=0)
          @foreach($atividade as $dados)

          @if($dados->status == 0)
               @php ($status = "VAMOS LÁ!")
               @php ($acao = "square_play_silver")  
               @php ($cor = "red")
               @php ($title = "Começar")       
          @elseif($dados->status == 1)
               @php ($status = "COMEÇEI")
               @php ($acao = "square_ok_silver") 
               @php ($cor = "orange") 
               @php ($title = "Concluir")
          @else      
               @php ($status = "TERMINEI")
               @php ($acao = "square_reload_silver") 
               @php ($cor = "green")
               @php ($title = "Recomeçar") 
          @endif

          <tr>
               <td>
                    <button data-toggle="collapse" data-target="#info{{$i}}" class="mais">
                         <img src="../storage/ikons/32/arrow_down_silver.png" title="Ampliar" id="mais-{{$i}}" onclick="mudarFigura(this)">
                    </button>
               </td>
               <td class="cor">
                    <div style="background-color: {{$dados->cor}};" class="info"></div>
               </td>
               <td class="atividade">{{$dados->atividade}}</td>
               <td class="status status-{{$cor}} bolder">
                    {{ $status }}
               </td>
               <td class="status-blue bolder">
                    <a href="{{ route('fazer', ['id' => $dados->id, 'status' => $dados->status]) }}">
                         <img src="../storage/ikons/32/{{ $acao }}.png" title="{{ $title }}">
                    </a>
               </td>
               <td class="status-blue bolder">
                    <a href="{{ route('deletar', ['id' => $dados->id]) }}" id="deleted">
                         <img src="../storage/ikons/32/bin_silver.png" title="Deletar">
                    </a>
               </td>
          </tr>
          <tr>
               <td colspan='6' id="info-mais-{{$i}}" class="mais none"><pre class="descricao">{{$dados->descricao}}</pre></td>
          </tr>
          @php ($i++)
          @endforeach
     @else
          <tr>
               <td colspan="5">Esse dia ainda não contém atividades, então vamos lá!</td>
          </tr>
     @endif
     </table>
</div>

@endsection