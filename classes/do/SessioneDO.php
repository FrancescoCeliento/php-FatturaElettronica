<?php

class SessioneDO extends BaseDO {
    
    public $sessionid;
    public $idutente;
    public $username;
    public $nome;
    public $sessionexpire;
    
    public $autenticato;
    
    function __construct($sessionid=null) {
        
        if ($sessionid!=null) {
        
            $this->autenticato = false;
            $this->sessionid = $sessionid;
                    
            // Se la sessione esiste ed è valida, procede
            if (   isset($_SESSION['sessionid'])
                && isset($_SESSION['idutente'])
                && isset($_SESSION['username'])
                && isset($_SESSION['nome'])
                && $_SESSION['sessionid'] == $sessionid) {
                    
                    $this->autenticato = true;
                    
                    $this->idutente  = $_SESSION['idutente'];
                    $this->username  = $_SESSION['username'];
                    $this->nome      = $_SESSION['nome'];
                }
                
                // altrimenti distruggi la sessione rimandi al main con messaggio warning
                else {
                    session_destroy();
                    session_start();
                    
                    /*$actionUtils = new ActionUtils();
                    $actionUtils->setWarning("È necessario eseguire la login per accedere al servizio");
                    $actionUtils->goView('main');*/
                }
                
                if ($this->autenticato && isset($_GET['view']) && ($_GET['view']=='login')) {
                    echo "Sei già stato autenticato";
                    /*$actionUtils = new ActionUtils();
                     $actionUtils->goView('main');*/
                }
        }
    
    }
    
    function save() {
        
        $_SESSION['sessionid'] = $this->sessionid;
        $_SESSION['idutente'] = $this->idutente;
        $_SESSION['username'] = $this->username;
        $_SESSION['nome'] = $this->nome;
    }
    
    function logout() {
        session_destroy();
        session_start();
        
        $actionUtils = new ActionUtils();
        $actionUtils->setInfo('Logout avvenuto correttamente');
        $actionUtils->goView('main');
    }
    
}