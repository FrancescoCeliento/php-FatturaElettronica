<?php
$aziendaDAO = new AziendaDAO();
$aziendaDO = $aziendaDAO->getDOBySingleCondition();
?>

<form action="<?=$actionUtils->resolve('azienda/modificaAziendaAction','azienda/aziendaDetail', 'azienda/modificaAzienda')?>" method="post">
<p>
<label>Denominazione</label>
<input name="denominazione" type="text" value="<?=$aziendaDO->denominazione?>"/>
</p>

<p>
<label>Regime fiscale</label>
<input name="regimefiscale" type="text" value="<?=$aziendaDO->regimefiscale?>"/>
</p>

<p>
<label>ID Paese fiscale</label>
<input name="idpaesefiscale" type="text" value="<?=$aziendaDO->idpaesefiscale?>"/>
</p>

<p>
<label>Codice fiscale</label>
<input name="codicefiscale" type="text" value="<?=$aziendaDO->codicefiscale?>"/>
</p>

<p>
<label>Codice azienda</label>
<input name="codiceazienda" type="text" value="<?=$aziendaDO->codiceazienda?>"/>
</p>

<p>
<label>Indirizzo sede</label>
<input name="indirizzosede" type="text" value="<?=$aziendaDO->indirizzosede?>"/>
</p>

<p>
<label>CAP sede</label>
<input name="capsede" type="text" value="<?=$aziendaDO->capsede?>"/>
</p>

<p>
<label>Comune sede</label>
<input name="comunesede" type="text" value="<?=$aziendaDO->comunesede?>"/>
</p>

<p>
<label>Provincia sede</label>
<input name="provinciasede" type="text" value="<?=$aziendaDO->provinciasede?>"/>
</p>

<p>
<label>Nazione sede</label>
<input name="nazionesede" type="text" value="<?=$aziendaDO->nazionesede?>"/>
</p>

<button type="submit">Modifica</button>

</form>

<a href="<?=$actionUtils->resolveView('azienda/aziendaDetail')?>"><button>Annulla</button></a>