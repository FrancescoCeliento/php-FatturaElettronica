<?php
$codiceazienda = $_GET['codiceazienda'];

$clienteDAO = new ClienteDAO();
$clienteDO = $clienteDAO->getDOBySingleCondition('codiceazienda',$codiceazienda);

?>
<section>
    <h1>Modifica cliente</h1>
    <form action="<?=$actionUtils->resolve('clienti/modificaClienteAction','clienti/clientiList', 'clienti/clientiList')?>" method="post">
        <p>
        <label>Denominazione</label>
        <input name="denominazione" type="text" value="<?=$clienteDO->denominazione?>" />
        </p>
        <p>
        <label>ID Paese fiscale</label>
        <input name="idpaesefiscale" type="text" value="<?=$clienteDO->idpaesefiscale?>"/>
        </p>
        <p>
        <label>Codice fiscale</label>
        <input name="codicefiscale" type="text" value="<?=$clienteDO->codicefiscale?>"/>
        </p>
        <p>
        <label>Codice azienda (non modificabile)</label>
        <input name="codiceazienda" type="text" value="<?=$clienteDO->codiceazienda?>" readonly title="Non puoi modificare il codice azienda. Se l'azienda ha cambiato codice ne dovrai creare un'altra."/>
        </p>
        <p>
        <label>Indirizzo sede</label>
        <input name="indirizzosede" type="text" value="<?=$clienteDO->indirizzosede?>"/>
        </p>
        <p>
        <label>CAP sede</label>
        <input name="capsede" type="text" value="<?=$clienteDO->capsede?>"/>
        </p>
        <p>
        <label>Comune sede</label>
        <input name="comunesede" type="text" value="<?=$clienteDO->comunesede?>"/>
        </p>
        <p>
        <label>Provincia sede</label>
        <input name="provinciasede" type="text" value="<?=$clienteDO->provinciasede?>"/>
        </p>
        <p>
        <label>Nazione sede</label>
        <input name="nazionesede" type="text" value="<?=$clienteDO->nazionesede?>"/>
        </p>
        <p>
        <label>Formato descrizione nella fattura</label>
        <input name="format" type="text" value="<?=$clienteDO->format?>"/>
        <br>
        Il formato della descrizione della fattura ti consente di impostare una descrizione personalizzata per ogni cliente. Lasciare vuoto per il formato di default, ovvero
        <pre>{codiceArticolo} {descrizioneArticolo}</pre>
        Tag disponibili per il formato della descrizione
        <table>
        	<thead>
        		<tr>
        			<th>Tag</th>
        			<th>Significato</th>
        		</tr>
        	</thead>
        	<tbody>
        		<tr>
        			<td><pre>{codiceArticolo}</pre></td>
        			<td>Codice dell'articolo</td>
        		</tr>
        		<tr>
        			<td><pre>{ordineArticolo}</pre></td>
        			<td>Ordine dell'articolo</td>
        		</tr>
        		<tr>
        			<td><pre>{descrizioneArticolo}</pre></td>
        			<td>Descrizione dell'articolo</td>
        		</tr>
        		<tr>
        			<td><pre>{numeroDDT}</pre></td>
        			<td>Numero del documento di trasporto</td>
        		</tr>
        		<tr>
        			<td><pre>{dataDDT}</pre></td>
        			<td>Data del documento di trasporto</td>
        		</tr>
        	</tbody>
        </table>
        </p>
        <button type="submit">Modifica</button>
	</form>
	
	<a href="<?=$actionUtils->resolveView('clienti/clientiList')?>"><button>Annulla</button></a>
</section>