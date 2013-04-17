<?php

//returns a connection object that can be used anywhere.

    class Database{
        
        //public $test = "heelo";
        
        private $connection = null; //this variable can be passed to anything that needs a database connection
        
        public function __construct()
        {
            if (!$this->connection)
            {
            // create db connection, using the constants from config/db.php
                $this->connection = new mysqli(db_host, db_user, db_pass, db_name);                        
            // if no connection errors: return true else false
                return (!$this->connection->connect_errno ? true : false);
            }
        }
        
        public function getDatabaseConnection()
        {
            return $this->connection;
        }
        public function getErrorNo()
        {
            return $this->connection->connect_errno;
        }
    }
?>