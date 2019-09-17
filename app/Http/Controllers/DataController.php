<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datas_com;


class DataController extends Controller
{
    //

    public function add_data(Request $request, Datas_com $datas_com){
        
        $data_com->dia = $request->dia;
        $data_com->mes = $request->mes;
        $data_com->comemoracao = $request->comemoracao;
        
        $save = $data_com->save();

        return redirect('/add');
    }
}
