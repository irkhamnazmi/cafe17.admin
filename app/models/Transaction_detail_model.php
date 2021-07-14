<?php 

class Transaction_detail_model{

    private $table = 't_transaction_detail';
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