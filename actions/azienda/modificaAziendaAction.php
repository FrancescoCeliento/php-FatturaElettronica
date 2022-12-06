<?php
$aziendaDAO = new AziendaDAO();
$aziendaDO = new AziendaDO();

$aziendaDO->denominazione  = $_POST['denominazione'];
$aziendaDO->regimefiscale  = $_POST['regimefiscale'];
$aziendaDO->idpaesefiscale = $_POST['idpaesefiscale'];
$aziendaDO->codicefiscale  = $_POST['codicefiscale'];
$aziendaDO->codiceazienda  = $_POST['codiceazienda'];
$aziendaDO->indirizzosede  = $_POST['indirizzosede'];
$aziendaDO->capsede        = $_POST['capsede'];
$aziendaDO->comunesede     = $_POST['comunesede'];
$aziendaDO->provinciasede  = $_POST['provinciasede'];
$aziendaDO->nazionesede    = $_POST['nazionesede'];

$aziendaDO->idutentemodifica = $sessione->idutente;

if ($aziendaDAO->save($aziendaDO)) {
    $actionUtils->setInfo("Informazioni azienda salvate correttamente");
    $actionUtils->goView($doneView);
} else {
    $actionUtils->setError("Errore durante il salvataggio delle nuove informazioni");
    $actionUtils->goView($errorView);
}


?>