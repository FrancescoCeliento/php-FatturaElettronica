<?php

class PasswordDAO extends BaseDAO {
    
    function getTable() {
        return "utentipassword";
    }
    
    function getDO() {
        return new PasswordDO();
    }
    
    function checkPassword($idutente,$password, $externaldb = null) {
        
        if ($externaldb == null) {
            $db = new DatabaseExecutor();            
        } else {
            $db = $externaldb;
        }
        
        $passwordDO = $this->getDOBySingleCondition("idutente", $idutente);
        
        $sTool = new SecureUtils();
        $cryptPass = $sTool-> cryptPassword($password, $passwordDO->salt, $passwordDO->keysalt);
        
        if ($externaldb == null) {
            $db->close();
        }
        
        
        return ($cryptPass==$passwordDO->password);
    }
}

?>