<?php
class Database {
    private $db_host = "127.0.0.1";
    private $db_name = "project-casino";
    private $db_user = "root";
    private $db_pass = "809ffb81";
    private $db_connection;
    public $connectError;

    function __construct() {
        $this->db_connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->db_connection->connect_error) {
            $this->connectError = "Connection failed: " . $this->db_connection->connect_error;
            die($this->connectError);
        }
    }

    public function connect() {
        return $this->db_connection;
    }

    function __destruct() {
        $this->db_connection->close();
    }
}

