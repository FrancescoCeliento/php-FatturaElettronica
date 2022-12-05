<?php

$idutente = $_POST['idutente'];

$db = new DatabaseExecutor();

$utenteDAO = new UtenteDAO();
$utenteDO = $utenteDAO->getDOBySingleCondition('idutente', $idutente, $db);

if($utenteDAO->delete($utenteDO,$db)) {
    $db->close();
    $actionUtils->setInfo("Utente eliminato correttamente");
    $actionUtils->goView($doneView);
} else {
    $db->close();
    $actionUtils->setInfo("Errore durante l'eliminazione dell'utente");
    $actionUtils->goView($errorView);
}

?>