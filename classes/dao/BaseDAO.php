<?php

class BaseDAO {
    
    // necessita di override
    function getTable() {
        return null;
    }
    
    // necessita di ovveride
    function getDO() {
        return null;
    }
    
    function getFieldsArray() {
        return array_keys(get_object_vars($this));
    }
    
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
    
    function getQuery() {
        $result = "SELECT ";
        $result.= $this->getFieldsString();
        $result.= " FROM ";
        $result.= $this->getTable();
        
        return $result;
    }
    
    function getAll() {
        $query = $this->getQuery();
        
    }
    
    function getByKey($chiave, $valore) {
        $query = $this->getQuery();
        $query.= " WHERE ";
        $query.=$chiave."='".$valore."'";
        
        return $query;
    }
    
    function save() {
        
    }
    
    function delete() {
        
    }
    
}

?>