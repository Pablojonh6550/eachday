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

          $u_mes = date('m');
          $u_ano = date('Y');

          $retorno = AgendaController::maximo($u_ano, $u_mes);
          $meses = AgendaController::convert($u_mes);

          $atividades_mes = AgendaController::atividade_user($user->id, $u_mes); 

          return view('agenda.calendario', ['maxmes' => $retorno[1], 'inimes' => $retorno[0], 'meses' => $meses, 'u_mes' => $u_mes, 'u_ano' => $u_ano, 'user' => $user, 'atividades_user' => $atividades_mes]);
     }

     public function mes(Request $request){
          $user = Auth::user();
          
          $u_mes = $request->list;
          $u_ano = 2019;

          $retorno = AgendaController::maximo($u_ano, $u_mes);
          $meses = AgendaController::convert($u_mes);
          
          $atividades_mes = AgendaController::atividade_user($user->id, $u_mes);

          return view('agenda.calendario', ['maxmes' => $retorno[1], 'inimes' => $retorno[0], 'meses' => $meses, 'u_mes' => $u_mes, 'u_ano' => $u_ano, 'user' => $user, 'atividades_user' => $atividades_mes]);
     }

     public function dia(Request $request) {
          $data = $request->data;

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
          $user = Auth::user();

          $agenda->fk_user = $user->id;
          $agenda->atividade = $request->add_tarefa;
          $agenda->dia = $request->data;
          $agenda->status = "1";
          $agenda->cor = $request->add_cor;
          $agenda->descricao = $request->add_descricao;

         $result =  $agenda->save();

          return redirect('/calendario')->with(['message'=> 'realizado com sucesso']);
     }

     public function checar_atividade(Request $request){
          $user = Auth::user();

          $data = $request->data;
          $atividade = DB::table('agendas')->where('fk_user', $user->id)->where('dia', $data)->get();

          return view('agenda.dados', ['atividade' => $atividade, 'data' => $data]);
     }

     public function convert($data)
     {
          $meses=['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
          return $meses[$data-1];

     } 

     public function select_id(Request $request){
          $dia = $request->dia;
          $mes = $request->mes;
          $ano = $request->ano;
     }

     public function deletar($id) {
          Agenda::find($id)->delete();
          return redirect('/calendario');
     }

     public function feita($id, $stts) {
          if($stts == 0) {
               $val = 1;
          } else {
               $val = 0;
          }

          Agenda::find($id)->update(['status' => $val]);
          return redirect('/calendario');
     }

     public function atividade_user($id, $mes){

          $r_dados = DB::select('select * from agendas where fk_user = ? and month(dia) = ?', [$id, $mes]);

          if(count($r_dados)>0){
               return $r_dados;
          }
  
      }
}