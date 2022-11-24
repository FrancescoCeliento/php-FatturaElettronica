<?php
include("include.php");
include("header.php");

if (isset($_GET['view']))
    $view = $_GET['view'];

    if (!isset($view)) {
?>
	<h2>Gestionale php-FatturaElettronica</h2>
	<p>Gestisci rapidamente le fatture elettroniche caricando solo le bolle e i documenti ricevuti, separatamente</p>
<?php

    } else 
        include ("views/".$view.".php");

include("footer.php");
?>