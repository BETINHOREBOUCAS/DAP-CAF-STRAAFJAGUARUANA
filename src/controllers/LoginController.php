<?php
namespace src\controllers;

use \core\Controller;
use src\Handlers\LoginHandlers;
use src\models\Empresas;
use src\models\Socios;
use src\models\Usuarios;

class LoginController extends Controller {

    public function __construct() {
        
    }

    public function login() {
        if (isset($_SESSION['usuario'])) {
            $this->redirect('');
        }

        $dados = [];
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        $this->render('login', $dados);
    }

    public function cadastro() {
        $dados = [];
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        $this->render('loginCadastro', $dados);
    }

    public function cadastroAction() {
        $empresa['cnpj'] = filter_var($_POST['cnpj'], FILTER_DEFAULT);
        $empresa['razao'] = filter_var($_POST['razao'], FILTER_DEFAULT);

        if (!Empresas::verifyEmpresa($empresa['cnpj'])) {
            $senha = filter_var($_POST['password'], FILTER_DEFAULT);
            $senha2 = filter_var($_POST['password2'], FILTER_DEFAULT);
            if ($senha == $senha2) {
                $dados['senha'] = password_hash($senha, PASSWORD_DEFAULT);
            } else {
                $_SESSION['notice'] = "Senha incorreta!";
                $this->redirect('/login/cadastro');
            }
            
            $dados['nome'] = filter_var($_POST['nome'], FILTER_DEFAULT);
            $dados['cpf'] = filter_var($_POST['cpf'], FILTER_DEFAULT);
            $dados['zap'] = filter_var($_POST['zap'], FILTER_DEFAULT);
            $dados['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $dados['nivel_acesso'] = json_encode(['master']);

            if (Usuarios::getUser($dados['cpf'])) {
                $_SESSION['notice'] = "O CPF ". $dados['cpf']. " já está cadastrado!";
                $this->redirect('/login/cadastro');
            }
            if (Usuarios::getUser($dados['email'])) {
                $_SESSION['notice'] = "O e-mail ". $dados['email']. " já está cadastrado!";
                $this->redirect('/login/cadastro');
            }

            $dados['id_empresa'] = Usuarios::addInfo('empresa', $empresa);

            Usuarios::addInfo('usuarios', $dados, $dados['id_empresa']);

            $_SESSION['notice'] = "Cadastro realizado com sucesso!";
            $this->redirect('/login');
        } else {
            $_SESSION['notice'] = "O CNPJ ". $empresa['cnpj']. " já está cadastrado!";
            $this->redirect('/login/cadastro');
        }       
        
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