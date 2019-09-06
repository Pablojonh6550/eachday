<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    //
    protected $fillable = ['user', 'receptor', 'mensagens'];
    protected $guarded = ['id'];
}
