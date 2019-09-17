<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datas_com extends Model
{
    //
    protected $fillable = ['dia', 'mes', 'comemoracao'];
    protected $guarded = ['id'];
}
