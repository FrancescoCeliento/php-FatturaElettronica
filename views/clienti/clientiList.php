<?php
$clienteDAO = new ClienteDAO();
?>
<section>
    <h1>Clienti</h1>
    <table>
    	<thead>
        	<tr>
        		<th>&nbsp;</th>
        		<th>Denominazione</th>
        		<th>Codice azienda</th>
        		<th>Codice fiscale</th>
        	</tr>
    	</thead>
    	<tbody>
    		<?php 
    		foreach($clienteDAO->getAllValid() as $clienteDO) {
    		?>
    		<tr>
        		<td><a href="<?=$actionUtils->resolveView('clienti/clienteDetail?codiceazienda='.$clienteDO->codiceazienda)?>"><button title="Dettaglio"><i class="fa-solid fa-folder-open"></i></button></a></td> 
    			<td><?=$clienteDO->denominazione?></td>
    			<td><?=$clienteDO->codiceazienda?></td>
    			<td><?=$clienteDO->codicefiscale?></td>
    			
    		</tr>
    		<?php
    		}
    		?>
    	</tbody>
    </table>
    
    <a href="<?=$actionUtils->resolveView('clienti/inserisciCliente')?>"><button>Inserisci nuovo cliente</button></a>
</section>