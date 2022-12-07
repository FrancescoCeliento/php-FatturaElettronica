<?php
$clienteDAO = new ClienteDAO();
$clienteDO = new ClienteDO();

$clienteDOcheck = $clienteDAO->getDOBySingleCondition('codiceazienda',$_POST['codiceazienda']);
if ($clienteDOcheck!=null) {
    $actionUtils->setWarning("Codice azienda esistente, non puoi inserire due clienti con lo stesso codice");
    $actionUtils->goView($errorView);
}

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
    $actionUtils->setInfo("Nuovo cliente inserito correttamente");
    $actionUtils->goView($doneView);
} else {
    $actionUtils->setError("Errore durante l'inserimento del nuovo cliente");
    $actionUtils->goView($errorView);
}

?>