<?php
include("include.php");

$db = new DatabaseExecutor();

$db -> test();

$db-> close();

?>