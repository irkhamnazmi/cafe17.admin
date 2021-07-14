<?php 

class Transaction_model{

    private $table = 't_transaction';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRow()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

}

?>