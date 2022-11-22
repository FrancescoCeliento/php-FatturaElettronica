<?php

$scan = scandir('classes/');
foreach ($scan as $class) {
    if (strpos($class, '.php') !== false) {
        include($scan . $class);
    }
}

?>