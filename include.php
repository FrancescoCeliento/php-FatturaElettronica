<?php session_start();
$classdir = "classes";
//do la precedenza ai "Base" perché altrimenti classi alfabeticamente precedenti non vengono caricate correttamente
include("classes/do/BaseDO.php");
include("classes/dao/BaseDAO.php");


$scandir = scandir($classdir."/");

foreach ($scandir as $subdir) {
    
    if ($subdir!="." && $subdir!="..") {
        $scansubdir = scandir($classdir."/".$subdir."/");
        foreach ($scansubdir as $class) {
    
            if (strpos($class, '.php') !== false && !(strpos($class, 'BaseDAO') !== false) && !(strpos($class, 'BaseDO') !== false) ) {
                //include($scan . $class);
                include($classdir."/".$subdir."/".$class);
            }            
        }
    }
    
}


$actionUtils = new ActionUtils();
$sessione = new SessioneDO(session_id());

?>