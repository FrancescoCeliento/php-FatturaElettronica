<?php

class SessioneDO extends BaseDO {
    
    public $sessionid;
    public $idutente;
    public $username;
    public $sessionexpire;
    
    private const prefixSession = 'php-fattelett-';
    private const sessionTimeout = prefixSession.'timeout';
    private const sessionId = prefixSession.'id';
    private const sessionUsername = prefixSession.'username';
    private const sessionIdUtente = prefixSession.'idutente';
    
    
    function checkSession($sessionid) {
        $redirecttologin = false;
        $timeout = 30 * 60; //TODO mappare da qualche parte questo parametro
        
        $query = ""; //TODO Query per la lettura dell'ultima sessione attiva
        $sessionsaved = "";
        
        /*
        
        
        
        
        if(isset($_SESSION[sessionTimeout])) {
            $duration = time() - (int)$_SESSION[sessionTimeout];
            if($duration > $timeout) {
                session_destroy();
                session_start();
                //recupera messaggio di sessione scaduta
                $redirecttologin=true;
            } else if ($sessionidsaved != $IDsession) {
                // controllo che la sessione appartenga all'utente in uso
                session_destroy();
                session_start();
                //recupera messaggio di sessione in uso da altro utente
                $redirecttologin=true;
            }
        } else  {
            $redirecttologin=true;
        }
        
        if ($_SERVER['PHP_SELF']!=leggi_parametro('software.login.selfpage')) {
            if ($redirecttologin) {
                header("location: login.php");
            } else {
                $_SESSION['timeout'] = time();
            }
        }*/
    }
    
    function save() {
        $_SESSION[sessionId] = $this->sessionid;
        $_SESSION[sessionUsername] = $this->username;
        $_SESSION[sessionIdUtente] = $this->idutente;
    }
    
}