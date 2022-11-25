<?php
//costanti
$sndrowtr = "#d3d3d3"; //colore seconda riga tabella
?>

<title>Rocco Cicli</title>
<div style="border: 2px solid; border-radius: 15px; background-color:palegreen; padding: 15px 15px 15px 15px;">
	<h1 align="center">Rocco Cicli</h1>
	<h2 align="center">php-FatturaElettronica</h2>
</div>
&nbsp;</br>

<?php if ($sessione->autenticato) { ?>
<div style="border: 2px solid; border-radius: 15px; padding: 15px 15px 15px 15px;" align="center">
	<?php 
	foreach (MenuEnum::$menuList as $view=>$label) {
	    echo '<a href="'.$actionUtils->resolveView($view).'">'.$label.'</a>';
	}
	?>
</div>
&nbsp;</br>
<?php } ?>

<div style="border: 2px solid; border-radius: 15px; padding: 15px 15px 15px 15px;">
<div align="right">
	<?php
	if ($sessione->autenticato) {
	    echo 'Ciao <b>'.$sessione->nome.'</b> (<a href="'.$actionUtils->resolve('auth/logoutAction','main').'">esci</a>)';
	} else if (!(isset($_GET['view']) && ($_GET['view']=='login'))){
	    
		echo '<a href="?view=login">Entra</a>';
	}
	?>
</div>