<?php

$idutente = $_GET['idutente'];

$utenteDAO = new UtenteDAO();
$utenteDO = $utenteDAO->getDOBySingleCondition('idutente', $idutente);

?>
<section>
    <h1>Elimina utente utente</h1>
    <form action="<?=$actionUtils->resolve('adminUtenti/eliminaUtenteAction','adminUtenti/utentiList', 'adminUtenti/utentiList')?>" method="post">
        <p>
        <label>ID utente</label>
        <input name="idutente" type="text" value="<?=$utenteDO->idutente?>" readonly/>
        </p>
        <p>
        <label>Username</label>
        <?=$utenteDO->username?>
        </p>
        <p>
        <label>Nome</label>
        <?=$utenteDO->nome?>
        </p>
        <p>
        <label>E-mail</label>
        <?=$utenteDO->email?>
        </p>
        <p class="notice">
        <strong>ATTENZIONE!</strong>
        <br>
        Completando la procedura di eliminazione dell'utente non potrai pi&ugrave; ripristinarlo. Se dovesse servire dovrai crearne uno nuovo.
        </p>
        <button type="submit">Elimina definitivamente</button>
    </form>
    
    <a href="<?=$actionUtils->resolveView('adminUtenti/utentiList')?>"><button>Annulla</button></a>
</section>