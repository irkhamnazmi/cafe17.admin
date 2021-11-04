<?php 

class Cashier_model{

    private $table = 'm_cashier';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getLogin($data)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE cashier_email = :email AND cashier_password = :pass');
        $this->db->bind('email',$data['email']);
        $this->db->bind('pass',$data['pass']);

        return $this->db->single();
    }

    
    public function getAllRow()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getRowById($id){
        $this->db->query('SELECT * FROM '. $this->table . ' WHERE cashier_id=:cashier_id');
        $this->db->bind('cashier_id', $id);
        return $this->db->single();
    }

    public function getRowByKeyword(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM '. $this->table . ' WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }


    public function add($data){
        $query ="INSERT INTO ". $this->table ."
                VALUES
                ('',CURRENT_TIMESTAMP, :cashier_name, :cashier_address, :cashier_category, :cashier_email, :cashier_phone_number, :cashier_password)";

        $this->db->query($query);
        $this->db->bind('cashier_name',$data['cashier_name']);
        $this->db->bind('cashier_address',$data['cashier_address']);
        $this->db->bind('cashier_category',$data['cashier_category']);
        $this->db->bind('cashier_email',$data['cashier_email']);
        $this->db->bind('cashier_phone_number',$data['cashier_phone_number']);
        $this->db->bind('cashier_password',$data['cashier_password']);

        $this->db->execute();

        return $this->db->rowCount();
                
    }

    public function edit($data){
        $query ="UPDATE ". $this->table ."
                SET cashier_name = :cashier_name, 
                    cashier_address = :cashier_address, 
                    cashier_category = :cashier_category, 
                    cashier_email = :cashier_email, 
                    cashier_phone_number = :cashier_phone_number, 
                    cashier_password = :cashier_password
                WHERE cashier_id = :cashier_id";

        $this->db->query($query);
        $this->db->bind('cashier_name',$data['cashier_name']);
        $this->db->bind('cashier_address',$data['cashier_address']);
        $this->db->bind('cashier_category',$data['cashier_category']);
        $this->db->bind('cashier_email',$data['cashier_email']);
        $this->db->bind('cashier_phone_number',$data['cashier_phone_number']);
        $this->db->bind('cashier_password',$data['cashier_password']);
        $this->db->bind('cashier_id',$data['cashier_id']);

        $this->db->execute();

        return $this->db->rowCount();
                
    }

    public function delete($id){
        $query ="DELETE FROM ". $this->table ."
                WHERE cashier_id = :cashier_id";

        $this->db->query($query);
        $this->db->bind('cashier_id',$id);
     
        $this->db->execute();

        return $this->db->rowCount();
                
    }

}

?>