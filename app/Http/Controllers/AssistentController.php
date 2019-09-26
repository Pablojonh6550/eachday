<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Assistent_Model;
use DB;

class AssistentController extends Controller
{
    public function pesquisa(Request $request){
      $chat = $request->pergunta;

      $pesquisa = DB::table('asssitent__models')->where('id',$chat)->get();

      if (count($pesquisa)) {
          # code...
          $resposta = $pesquisa[0]->resposta;
          return ["resposta" => $resposta];
      }else{

            return ["resposta" => "Insira uma opção valida!"];
      }
        
    
    }

    //CRUD assistent

    public function index_pergunta(){

        return view('assistente.assistente');
    }

    public function add_pergunta(Resquest $request){
        $add = $request->all();
        Assistent_Model::create($add);
        
        return redirect('');
    }

    public function deletar_pergunta($id){

        Assistent_Modal::find($id)->delete();

        return redirect('');
    }

    public function add_new_pergunt(){
        return view('agenda.novas');
    }
       
}