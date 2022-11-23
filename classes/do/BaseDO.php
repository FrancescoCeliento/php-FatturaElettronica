<?php

class BaseDO {
    
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
}

?>