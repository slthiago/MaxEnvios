<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class loginController extends Controller
{

    public function index(){
        return view('logistica.login');
    }

    public function logar(Request $req){
       $dados   = $req->all();
       $pass    = $dados['password'];
       $email   = $dados['email'];

        $res = Http::post("https://sandbox.evipes.com/api/v1/admin/user/login?api_token=NcBbsOCVRyENqEVAVDMrNQ0JXL2FlMph6zCUzHms9Rc446fVQb0l2I7gu7CuyaIu88TAftTgbdHUOSWT", [
            'email' => $email,
            'password' =>  $pass,
        ]);
        
        //Se code for diferente de 200, entra no if abaixo
        if($res->json()['code'] != 200) {
            return Redirect::back()->withErrors([$res->json()['message']]);
        }

        //pega os dados do user
        $nome           = $res->json()['data']['user_name'];
        $total_vendas   = $res->json()['data']['total_sales'];
        $token_user     = $res->json()['data']['account_token_id'];
        $avatar         = $res->json()['data']['user_image'];

        session(['nome' => $nome, 'total_vendas' => $total_vendas, 'token' => $token_user, 'avatar' => $avatar]);

        //return redirect('painel/home')->with('status', 'Usuário logado!');
        return view('painel.index') -> with(compact('nome','token_user', 'avatar'));

    }



    public function logout(){
        session()->flush();
        return redirect('logistica/login');
     }
}
