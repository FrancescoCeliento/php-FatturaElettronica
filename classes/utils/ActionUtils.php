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
    public $info = "";
    public $warning = "";
    public $error = "";
    
    function setInfo($info) {
        $this->info = $info;
    }
    
    function setWarning($warning) {
        $this->warning = $warning;
    }
    
    function setError($error) {
        $this->error = $error;
    }
    
    function resolve($action, $destination, $errorpage='') {
        $result = "actionExecutor.php?action=".urlencode($action)."&doneView=".urlencode($destination)."&errorView=".urlencode($errorpage);
        return $result;
    }
    
    function resolveView($view) {
        $result = "?view=".urlencode($view);
        return $result;
    }
    
    
    function goView($view) {
        if ($this->error != "") {
            header("location: ./?view=".urlencode($view)."&errorMessage=".urlencode($this->error));
            //echo "location: index.php?view=".$view."&warningMessage=".urlencode($this->warning);
        } else if ($this->warning != "") {
            header("location: ./?view=".urlencode($view)."&warningMessage=".urlencode($this->warning));
            //echo "location: index.php?view=".$view."&warningMessage=".urlencode($this->warning);
        }  else if ($this->info != "") {
            header("location: ./?view=".urlencode($view)."&infoMessage=".urlencode($this->info));
            //echo "location: index.php?view=".$view."&warningMessage=".urlencode($this->warning);
        }  else
            header("location: ./?view=".urlencode($view));
            //echo "location: ?view=".$view;
    }    
    
}