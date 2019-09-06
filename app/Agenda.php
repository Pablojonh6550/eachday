<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //
    protected $fillable = ['atividade', 'dia', 'status', 'cor', 'descricao'];
    protected $guarded = ['id_atividade', 'created_at', 'upadad_at'];
}