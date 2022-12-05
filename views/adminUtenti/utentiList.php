<?php
$utenteDAO = new UtenteDAO();
?>

<h1>Gestione accesso utenti</h1>
<table>
	<thead>
    	<tr>
    		<th>ID</th>
    		<th>Username</th>
    		<th>Nome</th>
    		<th>E-mail</th>
    		<th>Admin</th>
    		<th>&nbsp;</th>
    	</tr>
	</thead>
	<tbody>
    	<?php
    	foreach ($utenteDAO->getAllValid() as $utenteDO) {
    	?>
    	<tr>
    		<td><?=$utenteDO->idutente?></td>
    		<td><?=$utenteDO->username?></td>
    		<td><?=$utenteDO->nome?></td>
    		<td><?=$utenteDO->email?></td>
    		<td><?=$utenteDO->isAdminString()?></td>
    		<td><a href="<?=$actionUtils->resolveView('adminUtenti/modificaUtente?idutente='.$utenteDO->idutente)?>"><button title="Modifica utente">M</button></a> 
    		
    		<?php if(!$utenteDO->isAdmin()) { ?>
    		
    		<a href="<?=$actionUtils->resolveView('adminUtenti/eliminaUtente?idutente='.$utenteDO->idutente)?>"><button title="Elimina utente">E</button></a></td>
    		
    		<?php } ?>
    	</tr>
    	<?php
    	}
    	?>
	</tbody>
</table>

<a href="<?=$actionUtils->resolveView('adminUtenti/creaUtente')?>"><button>Crea nuovo utente</button></a>