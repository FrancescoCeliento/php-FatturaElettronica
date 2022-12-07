<!doctype html>
<html lang="it">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rocco cicli</title>
	<!-- The following are some stylesheets for testing -->
	<!-- Sanitize.css reset -->
	<!-- <link href="https://unpkg.com/sanitize.css" rel="stylesheet" /> -->
	<!-- Latest release version of Simple.css -->
	<!-- <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.css"> -->
	<!-- Latest commit from GitHub -->
	<!-- <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
	<!-- Local version -->
	<link rel="stylesheet" href="asset/css/simple.css">
	<link rel="stylesheet" href="asset/css/simplemax.css">
	<link rel="stylesheet" href="asset/css/all.css">
	<link rel="stylesheet" href="asset/css/fontawesome.css">
</head>

<body class="top">
	<header>
		<h1>Rocco Cicli</h1>
		<p>Gestionale php-FatturaElettronica</p>
		<nav>
			<ul>
			<?php
			    //voci menu
			    if ($sessione->autenticato) {
            	   foreach (MenuEnum::$menuList as $view=>$label) {
            	       echo '<li><a href="'.$actionUtils->resolveView($view).'" title="'.MenuEnum::$menuTitle[$view].'">'.$label.'</a></li>';
            	   }
            	
                	// voci menu amministrazione
                	if (isset($sessione->isadmin) && $sessione->isadmin) {
                    	foreach (MenuAdminEnum::$menuList as $view=>$label) {
                    	    echo '<li><a href="'.$actionUtils->resolveView($view).'" title="'.MenuAdminEnum::$menuTitle[$view].'">'.$label.'</a></li>';
                    	}
                	}
            	
			    }
            	
            	// Pulsante login/logout
            	if ($sessione->autenticato) {
            	    echo '<li><a href="'.$actionUtils->resolve('auth/logoutAction','main').'" title="'.$sessione->nome.' (Logout)"><i class="fa-solid fa-right-from-bracket"></i></a></li>';
            	} else if (!(isset($_GET['view']) && ($_GET['view']=='login'))){
            	    
            	    echo '<li><a href="?view=login" title="Login"><i class="fa-solid fa-right-to-bracket"></i></a></li>';
            	} 
            	?>
			</ul>
		</nav>
	</header>