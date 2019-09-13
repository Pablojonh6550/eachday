<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistent_Model extends Model
{
    protected $fillable = ['pergunta','resposta'];
    protected $guarded = ['id'];
}
