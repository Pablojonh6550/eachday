<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    //
    public function redirect(){
        return view('perfil');
    }

    public function atividade_user(Request $request){

        $id = $request->$id;

        $r_dados = DB::table('agendas')->where('fk_user',$id)->get();
        if(count($r_dados)>0){
            return redirect('/perfil',['atividade' => $request->atividades]);

        }

    }
}
