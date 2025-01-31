<?php

namespace Core;
use Core\Database;
use Core\App;
use Core\Session;


class Authenticator
{
    public function attempt($email, $password) {
        $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->find();
        
        if ($user) {
            if (password_verify($password, $user['password'])){
                $this->login([
                    "email" => $email
                ]);
                return true;
            }
        }
        return false;
    }

    
    public function login($user) {
        $_SESSION['user'] = [
            "email" => $user['email'],
        ];

        // update the session id with a newly generated one
        session_regenerate_id(true);
    }

    public function logout() {
        // reset the super global so that it's not referenced anywhere else
        // $_SESSION = [];
        Session::destroy();
    }
    }