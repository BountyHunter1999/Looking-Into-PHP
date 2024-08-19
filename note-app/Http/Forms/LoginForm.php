<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm {
    public function validate($email, $password) {
        $errors = [];
        // validate forms input
        if (! Validator::email($email)) {
            $errors['email'] = 'Please provide a valid email address';
        }

        if (! Validator::string($password, 7, 255)) {
            $errors['password'] = 'Please provide a password of at least 7 characters';
        }

        if (! empty($errors)) {
            return view("registration/create.view.php", ["errors"=> $errors]);
        }
    }
}