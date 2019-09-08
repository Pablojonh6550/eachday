<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ChatController extends Controller
{
    //
    public function index() {
        $user = Auth::user();
        $todos = User::all()->where('email', '!=', $user->email);

        return view('chat.contatos', ['user' => $user, 'todos' => $todos]);
    }

    public function mensagem($id) {
        $user = Auth::user();
        $msg = User::all()->where('user',$user)->where('receptor', $id);

        return view('chat.mensagens', ['mensagens' => $msg]);
    }
}
