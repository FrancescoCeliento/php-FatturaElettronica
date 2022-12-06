<?php
/**
 * 
 * 
 * @author FrancescoCeliento
 */
class BaseDO {
    
    public $dtinsert;
    
    function getKey() {
        return [];
    }
    
    function getFields() {
        return get_object_vars($this);
    }
    
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
    
    function bind($array) {
        $doFields = $this->getFields();
        
        foreach (array_keys($array) as $key) {
            
            if (array_key_exists($key,$doFields)) {
                $this->{$key} = $array[$key];
            }
        }
        return $this;
    }
    
}

?>