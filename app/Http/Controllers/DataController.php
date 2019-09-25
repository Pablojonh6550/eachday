<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datas_com;
use DB;

class DataController extends Controller
{
    //

    public function add_data(Request $request, Datas_com $datas_com)
    {

        $datas_com->dia = $request->dia;
        $datas_com->mes = $request->mes;
        $datas_com->data_comemorativa = $request->comemoracao;
        $datas_com->prioridade = $request->prioridade;

        $save = $datas_com->save();

        return redirect('/feriados');
    }

    public function exibir()
    {
        $feriados = DB::table('datas_coms')->where('prioridade','1')->orderBy('mes', 'ASC')->orderBy('dia', 'ASC')->get();

        return view('feriados.view', ['feriados' => $feriados]);
    }
}
