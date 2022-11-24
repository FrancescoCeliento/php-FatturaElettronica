<?php

class UtenteDAO extends BaseDAO {
    
    function getTable() {
        return "utenti";
    }
    
    function getDO() {
        return new UtenteDO();
    }
    
    function checkLogin($user,$password) {
        $db = new DatabaseExecutor();
        $query = 'SELECT username, password, salt, keysalt FROM utenti, utentipassword WHERE utenti.idutente = utentipassword.idutente AND utenti.dtdelete IS NULL AND utentipassword.dtdelete IS NULL';
        $resultset = $db -> querySingle($query, true);
        
        $sTool = new SecureUtils();
        $cryptPass = $sTool-> cryptPassword($password, $resultset['salt'], $resultset['keysalt']);

        $db->close();
        
        return $resultset['password'] == $cryptPass;
    }
}

?>