<?php
$utenteDAO = new UtenteDAO();
?>

<h1>Gestione accesso utenti</h1>
<table width="auto" align="center">
	<tr>
		<th>Username</th>
		<th>Nome</th>
		<th>Posta elettronica</th>
		<th>Amministratore</th>
		<th>&nbsp;</th>
	</tr>
	<?php
	$icount=0;
	foreach ($utenteDAO->getAllValid() as $utenteDO) {
	    if ($icount%2!=0) {
	        echo "<tr align='center' bgcolor='$sndrowtr'>";
	    } else {
	        echo "<tr align='center'>";
	    }
	?>
	<!-- <tr> -->
		<td><?=$utenteDO->username?></td>
		<td><?=$utenteDO->nome?></td>
		<td><?=$utenteDO->email?></td>
		<td><?=$utenteDO->isAdminString()?></td>
		<td><img src="images/edit.png"> <img src="images/delete.png"></td>
	</tr>
	<?php
	   $icount++;
	}
	?>
</table>



</table>

<hr width="100%" size="1" color="000000" style="margin-top:2em;">
<h2>Inserimento nuovo utente</h2>
<form action="<?=$actionUtils->resolve('adminUtenti/creaUtenteAction','adminUtenti/utentiList', 'adminUtenti/utentiList')?>" method="post">
	<table widht="auto" align="center">
		<tr>
			<th>Username</th>
			<th>Nome</th>
			<th>Password</th>
			<th>Posta elettronica</th>
			<th>Amministratore</th>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<td><input name="username" type="text"/></td>
			<td><input name="nome" type="text"/></td>
			<td><input name="password" type="password"/></td>
			<td><input name="email" type="text"/></td>
			<td align="center"><input name="isadmin" type="checkbox"/></td>
			<td align="center"><input type="submit" value="Crea" /></td>
		</tr>
	</table>
</form>