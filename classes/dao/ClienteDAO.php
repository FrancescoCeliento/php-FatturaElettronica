<?php

class ClienteDAO extends BaseDAO {
    
    function getTable() {
        return "clienti";
    }
    
    function getDO() {
        return new ClienteDO();
    }
}

?>