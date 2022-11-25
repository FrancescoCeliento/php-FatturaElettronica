<?php

$utenteDAO = new UtenteDAO();

$username = $_POST['username'];
$password = $_POST['password'];



if ($utenteDAO -> checkLogin($username, $password)) {
    $actionUtils->goView($doneView);
} else {
    $actionUtils->setWarning("Credenziali errate");
    $actionUtils->goView($errorView);
}

?>