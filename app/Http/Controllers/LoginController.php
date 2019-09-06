<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Agenda;

class LoginController extends Controller
{
    //
    public function index_login()
    {
        return view('agenda.login');
    }

    public function create(){
        return view('agenda.cadastro');
    }

    public function login_create(Request $request)
    {
       
        $add = $request->all();
        User::create($add);
    
        return redirect('/login');

    }

    public function deleter_user($id)
    {
        User::find($id)->delete();

        return redirect('agenda.login');
    }

    public function login_consul(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $usuario = DB::table('users')->where('email',$email)->where('password',$password)->get();

        if(count($usuario) > 0) {
            return redirect('/calendario');
        } else {
            return redirect('/login');
        }
        
    }

    public function editar_user($id)
    {
        $editar = User::find($id);

        return view('editar',['editar' => $editar]);
    }

    public function update(Request $request,$id)
    {
        $update = User::find($id)->update($request->all());

        return redirect('editar');
    }
}
