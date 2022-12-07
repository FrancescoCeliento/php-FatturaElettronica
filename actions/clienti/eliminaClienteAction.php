<?php

$codiceazienda = $_POST['codiceazienda'];

$db = new DatabaseExecutor();

$clienteDAO = new ClienteDAO();
$clienteDO = $clienteDAO->getDOBySingleCondition('codiceazienda', $codiceazienda, $db);

if($clienteDAO->delete($clienteDO,$db)) {
    $db->close();
    $actionUtils->setInfo("Cliente eliminato correttamente");
    $actionUtils->goView($doneView);
} else {
    $db->close();
    $actionUtils->setInfo("Errore durante l'eliminazione del cliente");
    $actionUtils->goView($errorView);
}

?>