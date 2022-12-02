<?php

$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$rptpassword = $_POST['rptpassword'];

$passwordDAO = new PasswordDAO();

if ($newpassword <> $rptpassword) {
    $actionUtils->setWarning("Non hai ripetuto correttamente la nuova password");
    $actionUtils->goView($errorView);
} else if (!$passwordDAO->checkPassword($sessione->idutente,$oldpassword)) {
    $actionUtils->setWarning("Non hai inserito correttamente la vecchia password");
    $actionUtils->goView($errorView);
} else {
    $secureUtils = new SecureUtils();
    
    $salt = $secureUtils->newSalt();
    $keysalt = $secureUtils->newKeysalt();
    
    $newPasswordDO = new PasswordDO();
    $newPasswordDO->idutente = $sessione->idutente;
    $newPasswordDO->password = $secureUtils->cryptPassword($newpassword, $salt, $keysalt);
    $newPasswordDO->salt = $salt;
    $newPasswordDO->keysalt = $keysalt;
    
    if ($passwordDAO->save($newPasswordDO)) {
        $actionUtils->setInfo("Password cambiata correttamente");
        $actionUtils->goView($doneView);
    } else {
        $actionUtils->setError("Si &egrave; verificato un errore in fase di esecuzione");
        $actionUtils->goView($errorView);
    }
    
    
}
 



?>