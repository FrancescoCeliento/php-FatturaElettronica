<?php
include("include.php");
include("header.php");

if (isset($_GET['view']))
    $view = $_GET['view'];
else
    $view = 'main';

?>
<main>

<?php 
    
    ///Gestione messaggi di errore
    if (isset($_GET['errorMessage'])) {
        ?>
        <p class="notice">
        	<strong>Errore</strong>
        	<br>
        	<?=$_GET['errorMessage']?>
        </p>
        <?php 
    } else if (isset($_GET['warningMessage'])) {
        ?>
        <p class="notice">
        	<strong>Attenzione</strong>
        	<br>
        	<?=$_GET['warningMessage']?>
        </p>
        <?php 
    } else if (isset($_GET['infoMessage'])) {
        ?>
        <p class="notice">
        	<strong>Info</strong>
        	<br>
        	<?=$_GET['infoMessage']?>
        </p>
        <?php 
    }
    

include ("views/".$view.".php");
?>
</main>
<?php 
include("footer.php");
?>