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
    
    $newPasswordDO = new PasswordDO();
    $newPasswordDO->idutente = $sessione->idutente;
    $newPasswordDO->salt = $secureUtils->newSalt();
    $newPasswordDO->keysalt = $secureUtils->newKeysalt();
    $newPasswordDO->password = $secureUtils->cryptPassword($newpassword, $newPasswordDO->salt, $newPasswordDO->keysalt);
    $newPasswordDO->idutentemodifica = $sessione->idutente;
    
    
    if ($passwordDAO->save($newPasswordDO)) {
        $actionUtils->setInfo("Password cambiata correttamente");
        $actionUtils->goView($doneView);
    } else {
        $actionUtils->setError("Si &egrave; verificato un errore in fase di esecuzione");
        $actionUtils->goView($errorView);
    }
    
    
}
 



?>