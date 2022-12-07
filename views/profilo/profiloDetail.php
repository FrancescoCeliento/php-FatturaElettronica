<?php

$utenteDAO = new UtenteDAO();
$utenteDO = $utenteDAO->getDOBySingleCondition("idutente", $sessione->idutente);

?>
<section>
    <h1>Profilo utente</h1>
    <p>I dettagli del profilo sono editabili solo dall'amministratore. L'unica possibilit&agrave; che ha l'utente &egrave; quella di modificare la password di accesso.</p>
    <p>
    	<label>Username</label>
    	<?=$utenteDO->username?>
    </p>
    <p>
    	<label>Nome</label>
    	<?=$utenteDO->nome?>
    </p>
    <p>
    	<label>Posta elettronica</label>
    	<?=$utenteDO->email?>
    </p>
</section>

<section>
<h2>Cambio password</h2>
<form action="<?=$actionUtils->resolve('profilo/cambiaPasswordAction','profilo/profiloDetail', 'profilo/profiloDetail')?>" method="post">
    <p>
    	<label>Vecchia password</label>
    	<input type="password" name="oldpassword" />
    </p>
    <p>
    	<label>Nuova password</label>
    	<input type="password" name="newpassword" />
    </p>
    <p>
    	<label>Ripeti nuova password</label>
    	<input type="password" name="rptpassword" />
    </p>
    <button type="submit" >Cambia password</button>
</form>
</section>