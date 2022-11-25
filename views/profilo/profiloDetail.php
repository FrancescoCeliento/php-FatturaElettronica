<?php

$utenteDAO = new UtenteDAO();
$utenteDO = $utenteDAO->getDOBySingleCondition("idutente", $sessione->idutente);

?>

<h1>Profilo utente</h1>
<p>I dettagli del profilo sono editabili solo dall'amministratore. L'unica possibilit&agrave; che ha l'utente &egrave; quella di modificare la password di accesso.</p>
<div>
	<p><b>Username: </b> <?=$utenteDO->username?></p>
	<p><b>Nome: </b> <?=$utenteDO->nome?></p>
	<p><b>E-mail: </b> <?=$utenteDO->email?></p>
</div>

<hr width=100% size=2 color=000000>
<h2>Cambio password</h2>
<form action="<?=$actionUtils->resolve('profilo/cambiaPasswordAction','profilo/profiloDetail', 'profilo/profiloDetail')?>" method="post">
<table align="center">
	<tr><td>Vecchia password</td><td><input type="password" name="vecchiapassword" /></td></tr>
	<tr><td>Nuova password</td><td><input type="password" name="nuovapassword" /></td></tr>
	<tr><td>Ripeti nuova password</td><td><input type="password" name="ripetipassword" /></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="Cambia password" /></td></tr>
</table>
</form>