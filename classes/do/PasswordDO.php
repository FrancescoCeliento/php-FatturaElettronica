<?php

class PasswordDO extends BaseDO {
    public $idutente;
    public $password;
    public $salt;
    public $keysalt;
    public $idutentemodifica;
    
    function getKey() {
        return ['idutente'];
    }
}

?>