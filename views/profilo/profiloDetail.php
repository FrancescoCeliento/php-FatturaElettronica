<?php

$utenteDAO = new UtenteDAO();
$utenteDO = $utenteDAO->getDOBySingleCondition("idutente", $sessione->idutente);

?>

<h1>Profilo utente</h1>
<p>I dettagli del profilo sono editabili solo dall'amministratore. L'unica possibilit&agrave; che ha l'utente &egrave; quella di modificare la password di accesso.</p>
<table>
	<tr>
		<th align="left">Username</th>
		<td><?=$utenteDO->username?></td>
	</tr>
	<tr>
		<th align="left">Nome</th>
		<td><?=$utenteDO->nome?></td>
	</tr>
	<tr>
		<th align="left">Posta elettronica</th>
		<td><?=$utenteDO->email?></td>
	</tr>
</table>

<hr width=100% size=2 color=000000>
<h2>Cambio password</h2>
<form action="<?=$actionUtils->resolve('profilo/cambiaPasswordAction','profilo/profiloDetail', 'profilo/profiloDetail')?>" method="post">
<table align="center">
	<tr><td>Vecchia password</td><td><input type="password" name="oldpassword" /></td></tr>
	<tr><td>Nuova password</td><td><input type="password" name="newpassword" /></td></tr>
	<tr><td>Ripeti nuova password</td><td><input type="password" name="rptpassword" /></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="Cambia password" /></td></tr>
</table>
</form>