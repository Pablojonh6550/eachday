@extends('layouts.atividades')  

@section('atividades') 
<div class="tabelaatividade">
     <table class="table">
     <tr>
          <td colspan="3"></td>
          <td colspan="2" class="adicionar"><a href="{{route('tarefa')}}" class="adicionar bolder"><img src="../storage/ikons/32/circle_plus_blue.png"> CRIAR</a></td>
     </tr>
     
     <th colspan='3'>Atividade</th>
     <!-- <th>Status</th> -->
     <th colspan='2'>Ações</th>

     @if(count($atividade) > 0)
          @php ($i=0)
          @foreach($atividade as $dados)

          @if($dados->status == 0)
               @php ($status = "circle")
               @php ($acao = "square_play_silver")  
               @php ($cor = "red")
               @php ($title = "Começar")       
          @elseif($dados->status == 1)
               @php ($status = "chart_3_8")
               @php ($acao = "square_ok_silver") 
               @php ($cor = "orange") 
               @php ($title = "Concluir")
          @else      
               @php ($status = "chart_5_8")
               @php ($acao = "square_reload_silver") 
               @php ($cor = "green")
               @php ($title = "Recomeçar") 
          @endif

          <tr>
               <td>
                    <button data-toggle="collapse" data-target="#info{{$i}}" class="mais">
                         <img src="../storage/ikons/32/arrow_down_silver.png" title="Ampliar" id="mais-{{$i}}" onclick="MudarFigura(this)">
                    </button>
               </td>
               <td class="cor">
                    <div style="background-color: {{$dados->cor}};" class="info"></div>
               </td>
               <td class="atividade">{{$dados->atividade}}</td>
               <!-- <td class="status status-{{$cor}} bolder">
                    <img src="../storage/ikons/32/{{$status}}.png">
               </td> -->
               <td class="status-blue bolder">
                    <a href="{{ route('fazer', ['id' => $dados->id, 'status' => $dados->status]) }}">
                         <img src="../storage/ikons/32/{{ $acao }}.png" title="{{ $title }}">
                    </a>
               </td>
               <td class="status-blue bolder">
                    <a href="{{ route('deletar', ['id' => $dados->id]) }}">
                         <img src="../storage/ikons/32/bin_silver.png" title="Deletar">
                    </a>
               </td>
          </tr>
          <tr>
               <td colspan='6' id="info{{$i}}" class="collapse mais">{{ nl2br($dados->descricao) }}</td>
          </tr>
          @php ($i++)
          @endforeach
     @else
          <tr>
               <td colspan="5">Esse dia ainda não contém atividades, adicione agora!</td>
          </tr>
     @endif
     </table>
</div>
@endsection