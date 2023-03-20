<?php
 
class dataBase{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'SaleP';

    private $mysqli;

    function __construct() {
            $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->db);
            if ($this->mysqli -> connect_error) {
                printf("Соединение не удалось: %s\n", $mysqli -> connect_error);
                exit();
            };
    }
    public function query(string $sql = ''){
        $this->mysqli->query($sql);
    }
    public function queryFetch(string $sql = ''){
            $res = $this->mysqli->query($sql);
            return $res->fetch_all(MYSQLI_ASSOC);
    }
    public function queryRow(string $sql = ''){
        $res = $this->mysqli->query($sql);
        return $res->fetch_row();
    }
} 