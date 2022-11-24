<?php
/**
 * Classe da estendere a tutte le classi di tipo DAO. Contiene tutte le funzioni utili per l'interfacciamento automatico al database.
 * 
 * @author FrancescoCeliento
 *
 */
class BaseDAO {
    
    // necessita di override
    function getTable() {
        return null;
    }
    
    // necessita di ovveride
    function getDO() {
        return null;
    }
      
    /**
     * Formatta la query con tutti i campi e la tabella utile per eseguire una SELECT ALL.
     * 
     * @return String
     * @author FrancescoCeliento
     */
    function getSelectAllQuery() {
        //$objectDO = $this->getDO();
        
        $result = "SELECT ";
        $result.= ($this->getDO())->getFieldsString();
        $result.= " FROM ";
        $result.= $this->getTable();
        
        return $result;
    }
    
    /**
     * La funzione esegue una select all di tutti i valori di una query.
     * 
     * Inserendo un parametro di tipo DatabaseExecutor il metodo non chiude la connessione dopo la sua esecuzione, in quanto si aspetta venga chiusa esternamente.
     * Se la transazione deve essere unica, il parametro $db non deve essere passato.
     * 
     * @param DatabaseExecutor $db
     * @return BaseDO instance
     * @author FrancescoCeliento
     */
    function getAll($db = null) {
        $query = $this->getSelectAllQuery();
        //TODO: Gestire l'esecuzione della query, per ora è solo un test
        return $query;
    }
    
    /**
     * Inserendo un parametro di tipo DatabaseExecutor il metodo non chiude la connessione dopo la sua esecuzione, in quanto si aspetta venga chiusa esternamente.
     * Se la transazione deve essere unica, il parametro $db non deve essere passato.
     * 
     * @param String $chiave
     * @param String $valore
     * @param DatabaseExecutor $db
     * @return BaseDO instance
     * @author FrancescoCeliento
     */
    function getBySingleCondition($chiave, $valore, $db = null) {
        $query = $this->getSelectAllQuery();
        $query.= " WHERE ";
        $query.=$chiave."='".$valore."'";
        
        return $query;
    }
    
    /**
     * Inserendo un parametro di tipo DatabaseExecutor il metodo non chiude la connessione dopo la sua esecuzione, in quanto si aspetta venga chiusa esternamente.
     * Se la transazione deve essere unica, il parametro $db non deve essere passato.
     * 
     * @param Array $map
     * @param DatabaseExecutor $db
     * @return BaseDO
     * @author FrancescoCeliento
     */
    function getByMapConditions($map, $db = null) {
        
    }
    
    /**
     * Si occupa di eseguire l'insert o l'update in base alla già presenza di una riga valida che rispetta le colonne indicate nella getUniqueKey() dell'oggetto DO. Se esiste una riga con le colonne specificate e dtdelete=null, allora storicizza la vecchia riga prima di inserire la nuova.
     * 
     * Inserendo un parametro di tipo DatabaseExecutor il metodo non chiude la connessione dopo la sua esecuzione, in quanto si aspetta venga chiusa esternamente.
     * Se la transazione deve essere unica, il parametro $db non deve essere passato.
     * 
     * @param DatabaseExecutor $db
     * @author FrancescoCeliento
     */
    function save($db = null) {
        
    }
    
    function delete($db = null) {
        
    }
    
}

?>