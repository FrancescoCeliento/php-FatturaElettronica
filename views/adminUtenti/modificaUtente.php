<?php 

$idutente = $_GET['idutente'];

$utenteDAO = new UtenteDAO();
$utenteDO = $utenteDAO->getDOBySingleCondition('idutente', $idutente);

?>
<section>
    <h1>Modifica utente</h1>
    <form action="<?=$actionUtils->resolve('adminUtenti/modificaUtenteAction','adminUtenti/utentiList', 'adminUtenti/utentiList')?>" method="post">
        <p>
        <label>ID utente</label>
        <input name="idutente" type="text" value="<?=$utenteDO->idutente?>" readonly/>
        </p>
        <p>
        <label>Username</label>
        <input name="username" type="text" value="<?=$utenteDO->username?>"/>
        </p>
        <p>
        <label>Nome</label>
        <input name="nome" type="text" value="<?=$utenteDO->nome?>"/>
        </p>
        <p>
        <label>Password</label>
        <input name="password" type="password"/>
        </p>
        <p>
        <label>E-mail</label>
        <input name="email" type="text" value="<?=$utenteDO->email?>"/>
        </p>
        <p>
        <label>Amministratore</label>
        <input name="isadmin" type="checkbox" <?php if ($utenteDO->isAdmin()) { echo " checked "; } if ($utenteDO->idutente == $sessione->idutente) {echo " disabled "; echo " title='Non puoi modificare i permessi di amministrazione della tua utenza' ";} ?> />
        </p>
        <button type="submit">Modifica</button>
    </form>
    
    <a href="<?=$actionUtils->resolveView('adminUtenti/utentiList')?>"><button>Annulla</button></a>
</section>
