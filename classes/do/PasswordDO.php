<?php

class PasswordDO extends BaseDO {
    public $idutente;
    public $password;
    public $salt;
    public $keysalt;
    
    function getKey() {
        return 'idutente';
    }
}

?>