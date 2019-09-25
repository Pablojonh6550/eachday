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
               @php ($status = "Incompleta")
               @php ($acao = "Começar")  
               @php ($cor = "red")       
          @elseif($dados->status == 1)
               @php ($status = "Fazendo")
               @php ($acao = "Terminar") 
               @php ($cor = "orange") 
          @else      
               @php ($status = "Feita")
               @php ($acao = "Desfazer") 
               @php ($cor = "green") 
          @endif
          <tr>
               <td><button data-toggle="collapse" data-target="#info{{$i}}" class="mais">+</button></td>
               <td class="cor"><div style="background-color: {{$dados->cor}};" class="info"></div></td>
               <td class="atividade">{{$dados->atividade}}</td>
               <td class="status status-{{$cor}}">{{$status}}</td>
               <td class="status-blue bolder">
                    <form action="{{route('fazer')}}" method="post">
                         @csrf
                         <input type="hidden" name="id" value="{{$dados->id}}">
                         <input type="hidden" name="status" value="{{$dados->status}}">
                         <input type="hidden" name="data" value="{{$data}}">
                         <input type="submit" name="btn-fazer" class="btn btn-success alinkado" value="{{$acao}}">
                    </form>
               </td>
               <td class="status-blue bolder">
                    <form action="{{route('deletar')}}" method="post">
                         @csrf
                         <input type="hidden" name="id" value="{{$dados->id}}">
                         <input type="hidden" name="data" value="{{$dados->dia}}">
                         <input type="submit" name="btn-deletar" class="btn btn-danger" value="Deletar">
                    </form>
               </td>
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
               <a href="{{route('calendar')}}" class="btn btn-danger alinkado">Voltar</a>
               <button type="submit" name="btn-add" class="btn btn-primary">Adicionar</button>
          </form>
     </div>
</section>

@endsection