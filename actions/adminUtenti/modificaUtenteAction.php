<?php

$idutente = $_POST['idutente'];

$db = new DatabaseExecutor();

$utenteDAO = new UtenteDAO();
$utenteDO = $utenteDAO->getDOBySingleCondition('idutente', $idutente, $db);


if (isset($_POST['username']))
    $utenteDO->username = $_POST['username'];

if (isset($_POST['nome']))
    $utenteDO->nome = $_POST['nome'];

if (isset($_POST['password']) && $_POST['password']!="") {
    $passwordDAO = new PasswordDAO();
    $passwordDO = new PasswordDO();
    $secureUtils = new SecureUtils();
    
    $passwordDO->idutente = $utenteDO->idutente;
    $passwordDO->salt = $secureUtils->newSalt();
    $passwordDO->keysalt = $secureUtils->newKeysalt();
    $passwordDO->password= $secureUtils->cryptPassword($_POST['password'], $passwordDO->salt, $passwordDO->keysalt);
    $passwordDO->idutentemodifica = $sessione->idutente;
    
    if(!$passwordDAO->save($passwordDO, $db)) {
        $db->close();
        $actionUtils->setError("Errore durante il salvataggio della nuova password");
        $actionUtils->goView($errorView);
    }
}

if (isset($_POST['email']))
    $utenteDO->email = $_POST['email'];

if(isset($_POST['isadmin'])&& $_POST['isadmin']=="on") {
    $utenteDO->admin = 1;
} else {
    $utenteDO->admin = 0;
}

$utenteDO->idutentemodifica = $sessione->idutente;

if($utenteDAO->save($utenteDO,$db)) {
    $db->close();
    $actionUtils->setInfo("Utente aggiornato correttamente");
    $actionUtils->goView($doneView);
} else {
    $db->close();
    $actionUtils->setInfo("Errore durante il salvataggio dell'utente");
    $actionUtils->goView($errorView);
}

?>