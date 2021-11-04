<?php 

class Blog_model{
    private $table = 'm_blog';
    private $view = 'v_blog';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRow()
    {
        $this->db->query('SELECT * FROM ' . $this->view);
        return $this->db->resultSet();
    }

    public function getRowById($id){
        $this->db->query('SELECT * FROM '. $this->view . ' WHERE blog_id=:blog_id');
        $this->db->bind('blog_id', $id);
        return $this->db->single();
    }


    public function add($data){
        $query ="INSERT INTO ". $this->table ."
                VALUES
                ('',CURRENT_TIMESTAMP, :blog_title, :cashier_id, :blog_image, :blog_description)";

        $this->db->query($query);
        $this->db->bind('blog_title',$data['blog_title']);
        $this->db->bind('cashier_id',$data['cashier_id']);
        $this->db->bind('blog_image',$data['blog_image']);
        $this->db->bind('blog_description',$data['blog_description']);
       

        $this->db->execute();

        return $this->db->rowCount();
                
    }


    public function edit($data){
        $query ="UPDATE ". $this->table ."
                SET blog_title = :blog_title, 
                    cashier_id = :cashier_id, 
                    blog_description = :blog_description, 
                    blog_image = :blog_image
                WHERE blog_id = :blog_id";

        $this->db->query($query);
        $this->db->bind('blog_title',$data['blog_title']);
        $this->db->bind('cashier_id',$data['cashier_id']);
        $this->db->bind('blog_description',$data['blog_description']);
        $this->db->bind('blog_image',$data['blog_image']);
        $this->db->bind('blog_id',$data['blog_id']);

        $this->db->execute();

        return $this->db->rowCount();
                
    }

    public function delete($id){
        $query ="DELETE FROM ". $this->table ."
                WHERE blog_id = :blog_id";

        $this->db->query($query);
        $this->db->bind('blog_id',$id);
     
        $this->db->execute();

        return $this->db->rowCount();
                
    }

}


?>