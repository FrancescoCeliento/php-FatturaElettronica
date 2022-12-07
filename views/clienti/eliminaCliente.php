<?php
$codiceazienda = $_GET['codiceazienda'];

$clienteDAO = new ClienteDAO();
$clienteDO = $clienteDAO->getDOBySingleCondition('codiceazienda',$codiceazienda);

?>
<section>
    <h1>Stai per eliminare questo cliente</h1>
    <form action="<?=$actionUtils->resolve('clienti/eliminaClienteAction','clienti/clientiList', 'adminUtenti/clientiList')?>" method="post">
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
        <input name="codiceazienda" type="text" readonly value="<?=$clienteDO->codiceazienda?>" />
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
    
        <p class="notice">
        <strong>ATTENZIONE!</strong>
        <br>
        Non potrai pi&ugrave; recuperare il cliente dopo l'eliminazione, in caso di necessit&agrave; dovrai ricrearlo.
        </p>
    	<button type="submit">Elimina definitivamente</button>
	</form>
    
	<a href="<?=$actionUtils->resolveView('clienti/clientiList')?>"><button>Torna indietro</button></a>
	<a href="<?=$actionUtils->resolveView('clienti/modificaCliente?codiceazienda='.$codiceazienda)?>"><button>Modifica</button></a>
	<a href="<?=$actionUtils->resolveView('clienti/eliminaCliente?codiceazienda='.$codiceazienda)?>"><button>Elimina</button></a>
</section>