<?php
$utenteDAO = new UtenteDAO();
$utenteDO = new UtenteDO();

$secureUtils = new SecureUtils();

$passwordDAO = new PasswordDAO();
$passwordDO = new PasswordDO();

$utenteDO->idutente = $utenteDAO->newIdUtente();
$utenteDO->username = $_POST['username'];
$utenteDO->nome = $_POST['nome'];
$utenteDO->email = $_POST['email'];

if(isset($_POST['isadmin'])) {
    $utenteDO->admin = 1;
} else {
    $utenteDO->admin = 0;
}

$password = $_POST['password'];

$passwordDO->idutente = $utenteDO->idutente;
$passwordDO->salt = $secureUtils->newSalt();
$passwordDO->keysalt = $secureUtils->newKeysalt();
$passwordDO->password = $secureUtils->cryptPassword($password, $passwordDO->salt, $passwordDO->keysalt);

$db = new DatabaseExecutor();
    
// Salvo il nuovo utente
if ($utenteDAO->save($utenteDO,$db) && $passwordDAO->save($passwordDO,$db)) {
    $actionUtils->setInfo("Nuovo utente creato correttamente");
    $actionUtils->goView($doneView);
    
} else {
    $actionUtils->setError("Errore durante la creazione del nuovo utente");
    $actionUtils->goView($errorView);
}

$db->close();
?>