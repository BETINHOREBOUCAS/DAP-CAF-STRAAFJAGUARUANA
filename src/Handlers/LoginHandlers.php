<?php

namespace src\Handlers;

use src\models\Usuarios;

class LoginHandlers {

    public function logar($user, $password) {
        $usuario = Usuarios::getUser($user);
        if ($usuario) {
            if (password_verify($password, $usuario['senha'])) { 
                $hash = password_hash(time(), PASSWORD_DEFAULT);               
                if (Usuarios::updateUser('usuarios', $hash, $usuario['id'])) {
                    return $hash;
                } else {
                    return false;
                }
            }
        }
    }
    
}
