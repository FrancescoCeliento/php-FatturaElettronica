<?php
$utenteDAO = new UtenteDAO();
?>

<h1>Gestione accesso utenti</h1>
<table>
	<thead>
    	<tr>
    		<th>Username</th>
    		<th>Nome</th>
    		<th>Posta elettronica</th>
    		<th>Amministratore</th>
    		<th>&nbsp;</th>
    	</tr>
	</thead>
	<tbody>
    	<?php
    	foreach ($utenteDAO->getAllValid() as $utenteDO) {
    	?>
    	<tr>
    		<td><?=$utenteDO->username?></td>
    		<td><?=$utenteDO->nome?></td>
    		<td><?=$utenteDO->email?></td>
    		<td><?=$utenteDO->isAdminString()?></td>
    		<td><img src="images/edit.png" alt="Modifica utente"> <img src="images/delete.png" alt="Cancella utente"></td>
    	</tr>
    	<?php
    	}
    	?>
	</tbody>
</table>



</table>

<hr width="100%" size="1" color="000000" style="margin-top:2em;">
<h2>Inserimento nuovo utente</h2>
<form action="<?=$actionUtils->resolve('adminUtenti/creaUtenteAction','adminUtenti/utentiList', 'adminUtenti/utentiList')?>" method="post">
	<p>
		<label>Username</label>
		<input name="username" type="text"/>
	</p>
	<p>
		<label>Nome</label>
		<input name="nome" type="text"/>
	</p>
	<p>
		<label>Password</label>
		<input name="password" type="password"/>
	</p>
	<p>
		<label>Posta elettronica</label>
		<input name="email" type="text"/>
	</p>
	<p>
		<label>Amministratore</label>
		<input name="isadmin" type="checkbox"/>
	</p>
	<button type="submit">Crea</button>
</form>