<?php
include("include.php");

// test connessione DB
/*$db = new DatabaseExecutor();

$db -> test();

$db-> close();*/

// test lettura campi

$parametro = new ParametroDAO();

echo $parametro->getByKey("chiave", "ciao");

?>