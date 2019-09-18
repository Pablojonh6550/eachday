<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datas_com;


class DataController extends Controller
{
    //

    public function add_data(Request $request, Datas_com $datas_com){
        
        $datas_com->dia = $request->dia;
        $datas_com->mes = $request->mes;
        $datas_com->data_comemorativa = $request->comemoracao;
        $datas_com->prioridade = $request->prioridade;
        
        $save = $datas_com->save();

        return redirect('/feriados');
        
    }
}
