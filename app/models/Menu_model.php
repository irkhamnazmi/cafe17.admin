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
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getDescRowKey($keyword)
    {
        $this->db->query('SELECT max(right(menu_code, 1)) AS code FROM '. $this->table . ' WHERE menu_code LIKE :keyword');
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->single();
    }

    public function getRowById($id){
        $this->db->query('SELECT * FROM '. $this->table . ' WHERE menu_id=:menu_id');
        $this->db->bind('menu_id', $id);
        return $this->db->single();
    }

    public function getRowByKeyword(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * '. $this->table . ' WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }


    public function add($data){
        $query ="INSERT INTO ". $this->table ."
                VALUES
                ('',CURRENT_TIMESTAMP, :menu_code, :menu_name, :menu_category, :menu_description, :menu_price, :menu_image)";

        $this->db->query($query);
        $this->db->bind('menu_code',$data['menu_code']);
        $this->db->bind('menu_name',$data['menu_name']);
        $this->db->bind('menu_category',$data['menu_category']);
        $this->db->bind('menu_description',$data['menu_description']);
        $this->db->bind('menu_price',$data['menu_price']);
        $this->db->bind('menu_image',$data['menu_image']);
       

        $this->db->execute();

        return $this->db->rowCount();
                
    }

    public function edit($data){
        $query ="UPDATE ". $this->table ."
                SET menu_name = :menu_name, 
                    menu_category = :menu_category, 
                    menu_description = :menu_description, 
                    menu_price = :menu_price, 
                    menu_image = :menu_image
                WHERE menu_id = :menu_id";

        $this->db->query($query);
        $this->db->bind('menu_name',$data['menu_name']);
        $this->db->bind('menu_category',$data['menu_category']);
        $this->db->bind('menu_description',$data['menu_description']);
        $this->db->bind('menu_price',$data['menu_price']);
        $this->db->bind('menu_image',$data['menu_image']);
        $this->db->bind('menu_id',$data['menu_id']);

        $this->db->execute();

        return $this->db->rowCount();
                
    }

    public function delete($id){
        $query ="DELETE FROM ". $this->table ."
                WHERE menu_id = :menu_id";

        $this->db->query($query);
        $this->db->bind('menu_id',$id);
     
        $this->db->execute();

        return $this->db->rowCount();
                
    }

}

?>