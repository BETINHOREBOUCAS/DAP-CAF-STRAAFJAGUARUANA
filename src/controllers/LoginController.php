<?php
namespace src\controllers;

use \core\Controller;
use src\Handlers\LoginHandlers;
use src\models\Usuarios;

class LoginController extends Controller {

    public function __construct() {
        if (isset($_COOKIE['user'])) {
            $this->redirect('');
        }
    }

    public function login() {
        $this->render('login');
    }

    public function loginAction() {
        $user = filter_input(INPUT_POST, 'user', FILTER_DEFAULT);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

        $login = new LoginHandlers;

        $hash = $login->logar($user, $password);
        if ($hash) {
            $usuario = Usuarios::getUser($user);
            $_SESSION['empresa'] = Usuarios::getEmpresa($usuario['id_empresa']);

            $_SESSION['usuario'] = $usuario;
            
            $this->redirect('');
        }

        $this->redirect('/login');
    }

    public function recuperar() {
        $dados = [];
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $dados['email'] = $_SESSION['email'];
            $_SESSION['notice'] = "";
            $_SESSION['email'] = "";
        }
        $this->render('loginRecuperarSenha', $dados);
    }

    public function recuperarAction() {
        $email = filter_input(INPUT_POST, 'user', FILTER_DEFAULT);
        if ($email) {
            $result = Usuarios::getUser($email);
            if ($result) {
               $para = $email;
               $assunto = "Recuperação de senha.";
               $msg = "codigo";
               $cabecalho = "From: straafjaguaruana@outlook.com"."\r\n". // Quem enviou
                "Reply-To: ".$email."\r\n".
                "X-Mailer: PHP/".phpversion();
                mail($para, $assunto, $msg, $cabecalho);
            } else {
                $_SESSION['notice'] = "E-mail digitado não cadastrado!";
                $_SESSION['email'] = $email;
                $this->redirect("/login/recuperar/senha");
            }
        } else {
            $_SESSION['notice'] = "Digite um e-mail";
            $this->redirect("/login/recuperar/senha");
        }
        $this->render('loginConfirmar');
    }

    public function senhaConfirmar() {
        $this->redirect('/login/recuperar/senha/confirmar');
    }

    public function logout() {
        session_destroy();

        $this->redirect('/login');
    }
}