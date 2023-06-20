<?php

namespace App\Http\Controllers;

use App\Mail\RecuperaSenha;
use Illuminate\Http\Request;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\Order;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('SITE.login');
    }
    public function autenticar(Request $request) {
        //regras de validação
        $regras = [
            'senha' => 'required'
        ];
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];
        $request->validate($regras, $feedback);
        $login = $request->get('usuario');
        $senha= $request->get('senha');
        
        echo "Usuário: $login | Senha: $senha";
        echo "<br>";
        $user = new user();
    // Cria o Objeto $usuario do Model $user -> onde login e senha são iguais aos informados na tela;
        $usuario = $user -> where('email', $login)
                         -> where('senha', $senha)
                         -> get()
                         -> first();
    
    // Verifica se o objeto $usuário possui o atributo IDUSER
        if(isset($usuario->id)) {
            return redirect()->route('home');
        } else {
    // Caso não encontre o usuário redireciona para a rota login passando o parametro de erro 1
            return redirect()->route('login',['erro' => 1]);
        }
    // exibe o log de SQLQuery
    //    dd(\DB::getQueryLog());
    }
}