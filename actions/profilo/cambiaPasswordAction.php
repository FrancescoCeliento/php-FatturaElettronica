<?php

$vecchiapassword = $_POST['vecchiapassword'];
$nuovapassword = $_POST['nuovapassword'];
$ripetipassword = $_POST['ripetipassword'];

$passwordDAO = new PasswordDAO();
$passworDO = $passwordDAO->getDOBySingleCondition('idutente', $sessione->idutente);

if ($nuovapassword!= $ripetipassword) {
    $actionUtils->setWarning("Non hai ripetuto correttamente la nuova password");
    $actionUtils->goView($errorView);
} else if ($passwordDAO->checkPassword($sessione->idutente,$vecchiapassword)) {
    $actionUtils->setWarning("Non hai inserito correttamente la vecchia password");
    $actionUtils->goView($errorView);
} else {
    $actionUtils->setInfo("Password cambiata correttamente");
    $actionUtils->goView($doneView);
}
 



?>