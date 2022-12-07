<?php

class ClienteDO extends BaseDO {
    public $denominazione;
    public $idpaesefiscale;
    public $codicefiscale;
    public $codiceazienda;
    public $indirizzosede;
    public $capsede;
    public $comunesede;
    public $provinciasede;
    public $nazionesede;
    public $format;
    
    public $idutentemodifica;
    
    function getKey(){
        return ['codiceazienda'];
    }
}

?>