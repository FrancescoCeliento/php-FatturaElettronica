<?php
include("include.php");
include("header.php");

if (isset($_GET['view']))
    $view = $_GET['view'];
else
    $view = 'main';

    ///Gestione messaggi di errore
    if (isset($_GET['errorMessage'])) {
        ?>
        <div width="100%" style="background-color: #ffb3b3; padding: 25px">
        	<font color="#ff0000">Errore: <?=$_GET['errorMessage']?></font>
        </div>
        <?php 
    } else if (isset($_GET['warningMessage'])) {
        ?>
        <div width="100%" style="background-color: #ffffb3; padding: 25px">
        	<font color="#999900">Warning: <?=$_GET['warningMessage']?></font>
        </div>
        <?php 
    } else if (isset($_GET['infoMessage'])) {
        ?>
        <div width="100%" style="background-color: #ccffcc; padding: 25px">
        	<font color="#00b300">Info: <?=$_GET['infoMessage']?></font>
        </div>
        <?php 
    }
    
    

include ("views/".$view.".php");
include("footer.php");
?>