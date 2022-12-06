<?php

class UtenteDO extends BaseDO {
    public $idutente;
    public $username;
    public $nome;
    public $email;
    public $admin;
    public $idutentemodifica;

    function getKey() {
        return ['idutente'];
    }
    
    function isAdmin() {
        return ($this->admin==1);
    }
    
    function isAdminString() {
        if ($this->admin==1)
            return "SI";
            else
                return "NO";
    }
}

?>