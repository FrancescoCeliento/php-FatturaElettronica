<?php
include("include.php");

// test connessione DB
/*$db = new DatabaseExecutor();

$db -> test();

$db-> close();*/

// test lettura campi

$parametro = new ParametroDO();

$parametro->{'chiave'} = 'ciao';

echo $parametro->chiave;

?>