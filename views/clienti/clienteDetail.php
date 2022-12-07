<?php
$codiceazienda = $_GET['codiceazienda'];

$clienteDAO = new ClienteDAO();
$clienteDO = $clienteDAO->getDOBySingleCondition('codiceazienda',$codiceazienda);

?>
<section>
    <h1>Dettaglio cliente</h1>
    <p>
    <label>Denominazione</label>
    <?=$clienteDO->denominazione?>
    </p>
    <p>
    <label>ID Paese fiscale</label>
    <?=$clienteDO->idpaesefiscale?>
    </p>
    <p>
    <label>Codice fiscale</label>
    <?=$clienteDO->codicefiscale?>
    </p>
    <p>
    <label>Codice azienda</label>
    <?=$clienteDO->codiceazienda?>
    </p>
    <p>
    <label>Indirizzo sede</label>
    <?=$clienteDO->indirizzosede?>
    </p>
    <p>
    <label>CAP sede</label>
    <?=$clienteDO->capsede?>
    </p>
    <p>
    <label>Comune sede</label>
    <?=$clienteDO->comunesede?>
    </p>
    <p>
    <label>Provincia sede</label>
    <?=$clienteDO->provinciasede?>
    </p>
    <p>
    <label>Nazione sede</label>
    <?=$clienteDO->nazionesede?>
    </p>
    <p>
    <label>Formato descrizione nella fattura</label>
    <pre><code><?php if($clienteDO->format!=null) { echo $clienteDO->format; } else { echo "{codiceArticolo} {descrizioneArticolo}"; } ?></code></pre>
    </p>
	<a href="<?=$actionUtils->resolveView('clienti/clientiList')?>"><button>Torna indietro</button></a>
	<a href="<?=$actionUtils->resolveView('clienti/modificaCliente?codiceazienda='.$codiceazienda)?>"><button>Modifica</button></a>
	<a href="<?=$actionUtils->resolveView('clienti/eliminaCliente?codiceazienda='.$codiceazienda)?>"><button>Elimina</button></a>
</section>