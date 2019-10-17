<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use Auth;
use DB;

class AgendaController extends Controller
{
    //
   
     public function index(){
          $user = Auth::user();
    
          if(session('u_mes')) {
               $u_mes = session('u_mes');
          } else {
               $u_mes = date('m');
          }

          $u_ano = date('Y');

          $retorno = AgendaController::maximo($u_ano, $u_mes);
          $meses = AgendaController::convert($u_mes);

          $atividades_mes = AgendaController::atividade_user($user->id, $u_mes); 

          return view('agenda.calendario', ['maxmes' => $retorno[1], 'inimes' => $retorno[0], 'meses' => $meses, 'u_mes' => $u_mes, 'u_ano' => $u_ano, 'user' => $user, 'atividades_user' => $atividades_mes]);
     }

     public function mes($mes){
          session(['u_mes'=>$mes]);
          return redirect('/calendario');
     }

     public function tarefa(){
          $data = session('data');

          return view('agenda.view', ['data' => $data]);
     }

     public function maximo($u_ano, $u_mes) {
          $ini = date("N", mktime(0,0,0,$u_mes,1,$u_ano))+1;

          if($u_mes == 2) {
               $max = 28;
          } elseif($u_mes == 4 || $u_mes == 6 || $u_mes == 9 || $u_mes == 11) {
               $max = 30;
          } else {
               $max = 31;
          }

          $dados = [$ini, $max];
          return $dados;
     }

     public function salvar(Request $request, Agenda $agenda){
          
          $request->session()->flash('success');

          if(session('success')){              
               $user = Auth::user();
               $agenda->fk_user = $user->id;
               $agenda->atividade = $request->add_tarefa;
               $agenda->dia = session('data');
               $agenda->status = "0";
               $agenda->cor = $request->add_cor;
               $agenda->descricao = $request->add_descricao;
               $agenda->save();
     
               $atividade = DB::table('agendas')->where('fk_user', $user->id)->where('dia', session('data'))->get();

               session(['atividade' => $atividade]);

               return redirect('/calendario/dia')->with('salvar', 'Tarefa salva com sucesso!');
          }
     }

     public function checar_atividade($data){
          $user = Auth::user();

          $atividade = DB::table('agendas')->where('fk_user', $user->id)->where('dia', $data)->get();

          session(['data' => $data]);
          session(['atividade' => $atividade]);

          return redirect('/calendario/dia');
     }

     public function entrar(){
          $data = date("d.m.Y", strtotime(session('data')));
          $atividade = session('atividade');

          return view('agenda.dados', ['atividade' => $atividade, 'data' => $data]);
     }

     public function convert($data){
          $meses=['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
          return $meses[$data-1];

     } 

     public function select_id(Request $request){
          $dia = $request->dia;
          $mes = $request->mes;
          $ano = $request->ano;
     }

     public function deletar($id) {
          $user = Auth::user();

          Agenda::find($id)->delete();
          $atividade = DB::table('agendas')->where('fk_user', $user->id)->where('dia', session('data'))->get();

          session(['atividade' => $atividade]);

          return redirect('/calendario/dia');
     }

     public function fazer($id, $status) {
          $user = Auth::user();

          $val = $status;
          if($val < 2) { $val++; } else { $val = 0; }

          Agenda::find($id)->update(['status' => $val]);
          $atividade = DB::table('agendas')->where('fk_user', $user->id)->where('dia', session('data'))->get();
          
          session(['atividade' => $atividade]);

          return redirect('/calendario/dia');
     }

     public function atividade_user($id, $mes){

          $r_dados = DB::select('select * from agendas where fk_user = ? and month(dia) = ? order by dia', [$id, $mes]);

          if(count($r_dados)>0){
               return $r_dados;
          }
  
      }

     
      public function feriados($mes){
          $feriados_dados = DB::select('select * from feriados where month(dia) = ? order by dia', [$mes]);

          if(count($feriados_dados)>0){
               return $feriados_dados;
          }
     }

          
}