@extends('layouts.calendar')  

@section('content')  
<div class='menu bordasilver'>
    <nav>
        <div class="container messemana" id="div_messemana">    
            <select class="btn btn-secondary" name="list" id="list" onchange="escolherMes(this)">
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

        </div>
    </nav>
    
</div>

<div class='calendario'>
    <table class="table-striped calendario bordasilver" border="1">
        <tr>
            <th colspan="7" class='mes-calendario'>{{ $meses }} de {{ $u_ano }}</th>
        </tr>
        <tr class='menu-calendario'>
            <td class='dia-blue'>DOM</td><td>SEG</td><td>TER</td><td>QUA</td><td>QUI</td><td>SEX</td><td class='dia-blue'>SAB</td>
        </tr>
         <!-------------------------------------------------- CALENDÁRIO / DIA  -------------------------------------------------->
        @php ($dia=1)
        @for($sem=0; $sem<=5; $sem++)
            <tr class="data">
            @for($cnd=1; $cnd<=7; $cnd++)
                @if($sem == 0 && $inimes > $cnd) 
                    <td></td>
                @elseif($dia <= $maxmes)   
                    <td onclick="escolherDia(this)" class="data" id="{{$u_ano.'-'.$u_mes.'-'.$dia}}">
                        <h1 class="bolder">{{$dia}}</h1>
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

<!-------------------------------------------------- QUADRO DE ATIVIDADES DO USUÁRIO  -------------------------------------------------->
<div class='perfil menu bordasilver'>
    <div>
        <ul class="navbar-nav ml-auto menu-auth">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->user }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        <div class="block" id="atividade">
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

        <div class="none" id="feriado">
            Feriados
        </div>
    </div>
</div>
@endsection