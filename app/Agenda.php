<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //
    protected $fillable = ['atividade', 'dia', 'status', 'cor', 'descricao', 'fk_user'];
    protected $guarded = ['id'];
}