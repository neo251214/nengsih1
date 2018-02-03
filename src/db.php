<?php
/**
 * Initialize Database Connection
 */
  namespace src;

  class db
  {
    public $conn;
    public $result;
    public $setcode = array();
    public $charset = 'utf-8';

    public function __construct ($server, $username, $password, $dbname)
    {
      $this->conn = new \mysqli($server, $username, $password, $dbname, 0, '/var/run/mysqld/mysqld.sock');
      // $this->conn = new \mysqli($server, $username, $password, $dbname, 0);

      $this->conn->query("SET NAMES UTF8");
      if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
      }
      // echo "Connected successfully";
    }

    public function query ($cmdSQL = '') {
      if (!empty($cmdSQL)) {
        $this->result = $this->conn->query($cmdSQL);
        return $this;
      } else {
        return false;
      }
    }

    public function find () {
      if (!empty($this->result)) {
        $this->setcode = $this->result->fetch_object();
        return $this->setcode;
      } else {
        return false;
      }
    }

    public function findAll () {
      if (!empty($this->result)) {
        $record = array();
        while ($row = $this->result->fetch_array()) {
          $record[] = (object) $row;
        }
        return $record;
      } else {
        return false;
      }
    }

    public function count () {
      if (!empty($this->result)) {
        return $this->result->num_rows;
      } else {
        return false;
      }
    }

    public function getStat () {
      if (!empty($this->result)) {
        return true;
      } else {
        return false;
      }
    }

    public function insert_id () {
      return $this->conn->insert_id;
    }
  }


 ?>
