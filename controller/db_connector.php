<?php

require_once "db_config.php";

class Database {

    public $host = HOST;
    public $user = USER;
    public $password = PASSWORD;
    public $database = DATABASE;

    public $link;
    public $error;

    public function __construct() {
        $this->dbConnect();
    }

    public function dbConnect() {
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if (!$this->link) {
            $this->error = "Database Connection Failed";    
            return false;
        }
    }

    public function insert($sql) {
        $result = mysqli_query($this->link, $sql) or die (mysqli_error($this->link) . __LINE__);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function update($sql) {
        $result = mysqli_query($this->link, $sql) or die (mysqli_error($this->link) . __LINE__);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function retrieve($sql) {
        $result = mysqli_query($this->link, $sql) or die (mysqli_error($this->link) . __LINE__);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }
}

?>