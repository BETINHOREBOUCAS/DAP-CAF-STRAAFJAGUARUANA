<?php

namespace src\Handlers;

use src\models\Usuarios;

class LoginHandlers {

    public function logar($user, $password) {
        $usuario = Usuarios::getUser($user);
        if ($usuario) {
            if (password_verify($password, $usuario['senha'])) { 
                $hash = password_hash(time(), PASSWORD_DEFAULT);               
                if (Usuarios::updateToken('usuarios', $hash, $usuario['id'])) {
                    return $hash;
                } else {
                    return false;
                }
            }
        }
    }

    public static function createPassword($password) {
        $teste = password_hash(123, PASSWORD_DEFAULT);
        var_dump(password_verify('123', $teste));
    }
    
}
