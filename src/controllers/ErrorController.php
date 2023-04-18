<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuarios;

class ErrorController extends Controller {

    public function __construct() {
        if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
            $this->redirect('/login');
        } else {
            $user = Usuarios::getUser($_SESSION['usuario']['email']);

            if ($_SESSION['usuario']['token'] != $user['token']) {
                $this->redirect('/login');
            }
        }
    }

    public function index() {
        $this->render('404');
    }

    public function permissao() {
        $this->render('permissao');
    }

}