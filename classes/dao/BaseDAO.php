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
    
    function getStoricizeRowQuery() {
        $dateUtil = new DateUtils();
        
        
        $result = "UPDATE ";
        $result.= $this->getTable();
        $result.= " SET dtdelete = ";
        $result.= "'".$dateUtil->getTodayToString()."'";
        
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
    function getAllValid($externaldb = null) {
        if ($externaldb==null) {
            $db = new DatabaseExecutor();
        } else {
            $db = $externaldb;
        }
        
        $query = $this->getSelectAllQuery()." WHERE dtdelete IS NULL";
        $results = $db->query($query);
        
        $doList = [];
        $doType = $this->getDO();
        
        while($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $do = ($this->getDO())->bind($row);
            
            array_push($doList, $do);
        }
        
        if ($externaldb==null) {
            $db->close();
        }
        
        return $doList;
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
    function getDOBySingleCondition($chiave = null, $valore = null, $externaldb = null) {
        
        $do = $this->getDO();
        
        if ($externaldb==null) {
            $db = new DatabaseExecutor();
        } else {
            $db = $externaldb;
        }
        
        $query = $this->getSelectAllQuery();
        $query.= " WHERE dtdelete IS NULL";
        
        if ($chiave!=null && $valore!=null) {
            $query.=" AND ".$chiave."='".$valore."'";            
        }
        
        $resultset = $db -> querySingle($query, true);
        
        if ($externaldb==null) {
            $db->close();
        }
        
        return $do->bind($resultset);
        
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
    function save($objDO, $externaldb = null) {
        if ($externaldb==null) {
            $db = new DatabaseExecutor();
        } else {
            $db = $externaldb;
        }
        
        if (!$this->delete($objDO, $db))
            return false;
            
        $insertQuery = "INSERT INTO ".$this->getTable()." (".$objDO->getFieldsString().") ";
        $insertQuery.= "VALUES (";
        
        $icount = 0;
        foreach ($objDO->getFieldsArray() as $field) {
            if ($field=='dtinsert') {
                $dateutil = new DateUtils();
                $valueCell = $dateutil->getTodayToString();
                
            } else {
                $valueCell = $objDO->{$field};
            }
            
            if ($icount==0) {
                $insertQuery.= "'".$valueCell."'";
                
            } else {
                $insertQuery.=", '".$valueCell."'";
                
            }
            $icount++;
        }
        $insertQuery.= ");";
        
        //echo $insertQuery;
        
        $result = $db->exec($insertQuery);
        
        if ($externaldb==null) {
            $db->close();
        }
        
        return $result;
        
    }
    
    function delete($objDO, $externaldb = null) {
        if ($externaldb==null) {
            $db = new DatabaseExecutor();
        } else {
            $db = $externaldb;
        }
        
        $updateQuery = $this->getStoricizeRowQuery();
        
        $updateQuery.= " WHERE dtdelete IS NULL";
       
        foreach ($objDO->getKey() as $keyDO) {
            $updateQuery.= " AND ".$keyDO." = '".$objDO->{$keyDO}."'";
        }
        
        $updateQuery.= ";";
        echo $updateQuery;
        
        $result = $db->exec($updateQuery);
        
        if ($externaldb==null) {
            $db->close();
        }
        
        return $result;
    }
    
}

?>