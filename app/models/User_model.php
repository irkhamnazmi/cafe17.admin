<?php 

class User_model {
    private $table = 'm_user';
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


    public function delete($id){
        $query ="DELETE FROM ". $this->table ."
                WHERE user_id = :user_id";

        $this->db->query($query);
        $this->db->bind('user_id',$id);
     
        $this->db->execute();

        return $this->db->rowCount();
                
    }


    public function getNewRow()
    {
        $this->db->query('SELECT COUNT(*) AS qty FROM ' . $this->table );
        return $this->db->single();
    }




}
