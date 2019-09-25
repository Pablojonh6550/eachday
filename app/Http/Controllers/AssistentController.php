<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Assistent_Model;
use DB;

class AssistentController extends Controller
{
    public function pesquisa(Request $request){
        $id = $request->tt;

        $pesquisa = DB::table('assistent_models')->where('id',$id)->get();
        $resposta = $pesquisa->resposta;
        if (count($pesquisa)) {
            # code...
            return response()->json(['resposta' => $resposta]);
        }else{
            return view('assistente.test');
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