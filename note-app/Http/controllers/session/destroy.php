<?php

// $_SESSION

use Core\Authenticator;

$auth = new Authenticator();

$auth->logout();

redirect("/");