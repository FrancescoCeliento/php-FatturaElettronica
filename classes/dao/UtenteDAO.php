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
        
        $query = 'SELECT utenti.idutente, username, nome, password, salt, keysalt FROM utenti, utentipassword WHERE utenti.idutente = utentipassword.idutente AND utenti.dtdelete IS NULL AND utentipassword.dtdelete IS NULL';
        $resultset = $db -> querySingle($query, true);
        
        $sTool = new SecureUtils();
        $cryptPass = $sTool-> cryptPassword($password, $resultset['salt'], $resultset['keysalt']);
        
        $loginOK = ($resultset['password'] == $cryptPass);

        if($loginOK) {
            $utentedo = $this->getDOBySingleCondition("idutente", $resultset['idutente'], $db);
            
            //salvo la sessione
            $sessione = new SessioneDO();
            $sessione->sessionid = session_id();
            $sessione->idutente = $utentedo->idutente;
            $sessione->username = $utentedo->username;
            $sessione->nome = $utentedo->nome;
            $sessione->save();
        }
        
        $db->close();

        
        return $loginOK;
    }
}

?>