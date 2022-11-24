<?php

class ActionUtils {
    
    /**
     * Definisce l'esecuzione dell'azione
     * 
     * @param String $action Azione richiamata
     * @param String $destination View di destinazione
     * @param String $errorpage View di ritorno in caso di errore
     * @return string
     * 
     * @author FrancescoCeliento
     */
    public $warning = "";
    
    function setWarning($warning) {
        $this->warning = $warning;
    }
    
    function resolve($action, $destination, $errorpage) {
        $result = "actionExecutor.php/?action=".$action."&doneView=".urlencode($destination)."&errorView=".urlencode($errorpage);
        return $result;
    }
    
    function goView($view) {
        
        if ($this->warning != "") {
            header("location: ../?view=".$view."&warningMessage=".urlencode($this->warning));
            //echo "location: index.php?view=".$view."&warningMessage=".urlencode($this->warning);
        } else
            header("location: ../?view=".$view);
            //echo "location: ?view=".$view;
    }
    
}