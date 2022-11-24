<?php
/**
 * 
 * 
 * @author FrancescoCeliento
 */
class BaseDO {
    
    /**
     * Ritorna un array contenente tutte le colonne mappate nel DO
     * 
     * @return array
     * @author FrancescoCeliento
     */
    function getFieldsArray() {
        return array_keys(get_object_vars($this));
    }
    
    /**
     * Ritorna una stringa che concatena tutti 
     * 
     * @return string
     * @author FrancescoCeliento
     * @example pkid,idutente,username,nome
     */
    function getFieldsString() {
        $arraykeys = $this->getFieldsArray();
        
        $icount = 0;
        foreach ($arraykeys as $key) {
            if ($icount == 0)
                $result=$key;
            else
                $result.= ",".$key;
            
                $icount++;
        }
        
        return $result;
    }
}

?>