<?php
$classdir = "classes";

$scandir = scandir($classdir."/");

foreach ($scandir as $subdir) {
    
    if ($subdir!="." && $subdir!="..") {
        $scansubdir = scandir($classdir."/".$subdir."/");
        foreach ($scansubdir as $class) {
    
            if (strpos($class, '.php') !== false) {
                //include($scan . $class);
                include($classdir."/".$subdir."/".$class);
            }            
        }
    }
    
}

?>