@extends('layouts.calendar')  

@section('content') 
<section class="dados">
     @if(count($atividade) > 0)
     <div class="tabelaatividade">
          <table class="table">
        
          <th colspan='3'>Atividade</th>
          <th>Status</th>
          <th colspan='2'>Ações</th>

          @php ($i=0)
          @foreach($atividade as $dados)

          @if($dados->status == 0)
               @php ($status = "Concluída")
               @php ($acao = "Desfazer")  
               @php ($cor = "green")       
          @else
               @php ($status = "Incompleta")
               @php ($acao = "Feita") 
               @php ($cor = "red")       
          @endif
          <tr>
               <td><button data-toggle="collapse" data-target="#info{{$i}}" class="mais">+</button></td>
               <td class="cor"><div style="background-color: {{$dados->cor}};" class="info"></div></td>
               <td class="atividade">{{$dados->atividade}}</td>
               <td class="status status-{{$cor}}">{{$status}}</td>
               <td class="status-blue bolder"><a href="{{route('feita', ['id' => $dados->id, 'valor' => $dados->status])}}" class="acoes">{{$acao}}</a></td>
               <td class="status-blue bolder"><a href="{{route('deletar', ['id' => $dados->id])}}" class="acoes">Deletar</a></td>
          </tr>

          <tr>
               <td colspan='6' id="info{{$i}}" class="collapse mais">{{$dados->descricao}}</td>
          </tr>
          @php ($i++)
          @endforeach
          </table>
     </div>
     
     @else
     <div class="alerta">
          <p>Esse dia ainda não contém nenhuma atividade, vamos lá adicione:</p>
     </div>
     @endif

     <div class="input-group mb-3"> 
          <form action="{{route('dia')}}" method="post">
          @csrf
               <div class="input-group-prepend"></div>
               <input type="hidden" name="data" value="{{$data}}">
               <a href="{{route('calendar')}}" class="btn btn-danger alinkado">Cancelar</a>
               <button type="submit" name="btn-add" class="btn btn-primary">Adicionar</button>
          </form>
     </div>
</section>

@endsection