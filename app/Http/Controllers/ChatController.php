<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Chats;
use DB;

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
        $recebe = User::all()->where('id', $id);
        $msg = DB::select('select * from chats where user = ? and receptor = ?', [$user->id, $id]);

        return view('chat.mensagens', ['contato' => $recebe, 'mensagens' => $msg]);
    }

    public function adicionar(Request $request, Chats $chat) {
        $user = Auth::user();
        $receptor = $request->receptor;
        $mensagem = $request->campotexto;

        $chat->user = $user->id;
        $chat->receptor = $receptor;
        $chat->mensagens = $mensagem;

        $chat->save();

        return redirect('chat/'.$receptor);
    }
    
}
