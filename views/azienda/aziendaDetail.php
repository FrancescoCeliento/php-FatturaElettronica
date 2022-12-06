<?php
$aziendaDAO = new AziendaDAO();
$aziendaDO = $aziendaDAO->getDOBySingleCondition();
?>

<p>
<label>Denominazione</label>
<?=$aziendaDO->denominazione?>
</p>

<p>
<label>Regime fiscale</label>
<?=$aziendaDO->regimefiscale?>
</p>

<p>
<label>ID Paese fiscale</label>
<?=$aziendaDO->idpaesefiscale?>
</p>

<p>
<label>Codice fiscale</label>
<?=$aziendaDO->codicefiscale?>
</p>

<p>
<label>Codice azienda</label>
<?=$aziendaDO->codiceazienda?>
</p>

<p>
<label>Indirizzo sede</label>
<?=$aziendaDO->indirizzosede?>
</p>

<p>
<label>CAP sede</label>
<?=$aziendaDO->capsede?>
</p>

<p>
<label>Comune sede</label>
<?=$aziendaDO->comunesede?>
</p>

<p>
<label>Provincia sede</label>
<?=$aziendaDO->provinciasede?>
</p>

<p>
<label>Nazione sede</label>
<?=$aziendaDO->nazionesede?>
</p>

<a href="<?=$actionUtils->resolveView('azienda/modificaAzienda')?>"><button>Modifica dati aziendali</button></a>