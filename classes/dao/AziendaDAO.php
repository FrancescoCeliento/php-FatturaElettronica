<?php

class AziendaDAO extends BaseDAO {
    
    function getTable() {
        return "azienda";
    }
    
    function getDO() {
        return new AziendaDO();
    }
}