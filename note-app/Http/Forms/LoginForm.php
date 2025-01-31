<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm {
    protected $errors = [];
    public function validate($email, $password) {
        // validate forms input
        if (! Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (! Validator::string($password, 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least 7 characters';
        }

        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function error($field, $message) {
        $this->errors[$field] = $message;
    }
}