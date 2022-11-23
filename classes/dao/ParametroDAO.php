<?php

class ParametroDAO extends BaseDAO {
    
    public $chiave;
    public $valore;
    public $visibile;
    
    function getTable() {
        return "parametri";
    }
    
    function getDO() {
        return new ParametroDO();
    }
}