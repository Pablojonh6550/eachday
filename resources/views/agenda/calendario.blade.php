@extends('layouts.calendar')  

@section('content')  

<div class='menu bordasilver'>
    <nav>
        <div class="container messemana" id="div_messemana">
            <form action="{{route('mes')}}" method="post">
            @csrf
                <select class="btn btn-secondary" name="list" id="list">
                    <option selected disabled= "true">Mês</option>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="4">Abril</option>
                    <option value="5">Maio</option>
                    <option value="6">Junho</option>
                    <option value="7">Julho</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>                            
                </select>

                <button type='submit' class='btn btn-primary'>OK</button>
            </form>
        </div>
        
    </nav>
</div>

@if(session('message'))
<script> $(document).ready(function(){ $("#alert").modal(); }); </script>
@endif

<div class='calendario'>
    <table class="table table-striped calendario bordasilver">
        <th colspan="7" class='mes-calendario'>{{ $meses }} de {{ $u_ano }}</th>
        <tr class='menu-calendario'>
            <td class='dia-blue'>D</td><td>S</td><td>T</td><td>Q</td><td>Q</td><td>S</td><td class='dia-blue'>S</td>
        </tr>
        @php ($dia=1)
        @for($sem=0; $sem<=5; $sem++)
            <tr class="data">
            @for($cnd=1; $cnd<=7; $cnd++) 
                @if($cnd == 1 || $cnd == 7)
                    @php ($classe = "primary")
                @else
                    @php ($classe = "secondary")
                @endif

                @if($sem == 0 && $inimes > $cnd) 
                    <td></td>
                @elseif($dia <= $maxmes)
                    <td>
                        <form action="{{route('checar'), $dia}}" method="post">
                        @csrf
                            <input type="hidden" name="data" value={{$u_ano}}-{{$u_mes}}-{{$dia}}>
                            <button type="submit" id="bnt-{{$u_ano}}{{$u_mes}}{{$dia}}" name="bnt-{{$u_ano}}{{$u_mes}}{{$dia}}" class="btn btn-outline-{{$classe}}" data-toggle="modal" data-target="#dia">
                                {{$dia}}
                            </button>
                        </form>
                    </td>               
                    @php ($dia++)
                @else
                    <td></td>
                @endif
            @endfor
            </tr>
        @endfor
    </table>
</div>

<div class='perfil menu bordasilver'>
    <div>
        <ul class="navbar-nav ml-auto menu-auth">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->user }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('chat_index') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('chat-form').submit();">
                        {{ __('Chat') }}
                    </a>

                    <form id="chat-form" action="{{ route('chat_index') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>    
    </div>

    <div class="atividades">
        @if($atividades_user)
            <table>
                <th colspan="2">Atividades do Mês</th>
            @foreach($atividades_user as $dados)
                @php($data = $dados->dia)
                
                @if(date('Y-m-d') == $data)
                    @php($atual = "atual")
                @else  
                    @php($atual = "")
                @endif

                <tr>
                    <td class="dia {{$atual}}">{{date('d', strtotime($data))}}</td>
                    <td class="atividade {{$atual}}">{{$dados->atividade}}</td>
                </tr>
            @endforeach
            </table>
        @endif
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Atividade adicionada!
      </div>
      
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
@endsection