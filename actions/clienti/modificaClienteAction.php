<?php
$codiceazienda = $_POST['codiceazienda'];

$db = new DatabaseExecutor();

$clienteDAO = new ClienteDAO();
$clienteDO = $clienteDAO->getDOBySingleCondition('codiceazienda', $codiceazienda, $db);

$clienteDO->denominazione = $_POST['denominazione'];
$clienteDO->idpaesefiscale = $_POST['idpaesefiscale'];
$clienteDO->codicefiscale = $_POST['codicefiscale'];
$clienteDO->codiceazienda = $_POST['codiceazienda'];
$clienteDO->indirizzosede = $_POST['indirizzosede'];
$clienteDO->capsede = $_POST['capsede'];
$clienteDO->comunesede = $_POST['comunesede'];
$clienteDO->provinciasede = $_POST['provinciasede'];
$clienteDO->nazionesede = $_POST['nazionesede'];
$clienteDO->format = $_POST['format'];

$clienteDO->idutentemodifica = $sessione->idutente;

if($clienteDAO->save($clienteDO)) {
    $actionUtils->setInfo("Cliente modificato correttamente");
    $actionUtils->goView($doneView);
} else {
    $actionUtils->setError("Errore durante la modifica del cliente");
    //$actionUtils->goView($errorView);
}

?>