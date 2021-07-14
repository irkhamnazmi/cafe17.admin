<?php 

class Menu_model{

    private $table = 'm_menu';
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