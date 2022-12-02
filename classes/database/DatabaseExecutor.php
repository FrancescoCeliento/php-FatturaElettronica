<?php
/*

doc: https://www.php.net/manual/en/sqlite3.query.php
*/

class DatabaseExecutor extends SQLite3 {
    
    public $dbfile = "database/data.db";
        
    function __construct() {
        
        if(!class_exists("SQLite3"))
            die ("SQLite3 is not supported");
        
        if(!file_exists($this->dbfile))
            die ($this->dbfile." is not exists");
        
            $this->open($this->dbfile);
            
    }
    
    function test() {
        $query = "SELECT username FROM utenti WHERE id_utente = 0";
        
        $username = $this->querySingle($query);
        
        echo $username;
    }
    
}

?>
