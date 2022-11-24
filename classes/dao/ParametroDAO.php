<?php

class ParametroDAO extends BaseDAO {
    
    function getTable() {
        return "parametri";
    }
    
    function getDO() {
        return new ParametroDO();
    }
}