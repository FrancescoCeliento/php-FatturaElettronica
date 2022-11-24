<?php
include("include.php");

$action = $_GET['action'];
$doneView = $_GET['doneView'];
$errorView = $_GET['errorView'];

include("actions/".$action.".php");

?>