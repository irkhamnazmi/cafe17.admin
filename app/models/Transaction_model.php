<?php 

class Transaction_model{

    private $table = 't_transaction';
    private $table_detail = 't_transaction_detail';
    private $view = 'v_transaction';
    private $view_p = 'v_transaction_payment';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRow()
    {
        $this->db->query('SELECT * FROM ' . $this->view_p);
        return $this->db->resultSet();
    }
    public function getMoneyIncomeRow()
    {
        $this->db->query('SELECT SUM(transaction_pay_total) AS total FROM ' . $this->table. ' WHERE transaction_status  = "Lunas" ');
        return $this->db->single();
    }
    public function getTotalRow()
    {
        $this->db->query('SELECT COUNT(*) AS qty FROM ' . $this->table. ' WHERE transaction_status  = "Lunas" ');
        return $this->db->single();
    }
   

    public function getSingleRowById($id){
        $this->db->query('SELECT * FROM '. $this->view . ' WHERE transaction_id =:transaction_id');
        $this->db->bind('transaction_id', $id);
        return $this->db->single();
    }

    public function getRowById($id)
    {
        $this->db->query('SELECT * FROM '. $this->view. ' WHERE transaction_id = :transaction_id');
        $this->db->bind('transaction_id',$id);
        return $this->db->resultSet();
    }


    public function getLastRow()
    {
        $this->db->query('SELECT max(transaction_invoice_code) AS code FROM ' . $this->table);
     
        return $this->db->single();
    }


    public function getRowByInvoice($id)
    {
        $this->db->query('SELECT * FROM '. $this->view. ' WHERE transaction_invoice_code = :transaction_invoice_code');
        $this->db->bind('transaction_invoice_code',$id);
        return $this->db->single();
    }
    
    public function postInsertRow($data)
    {
        $query ="INSERT INTO ". $this->table ."
                VALUES
                ('',CURRENT_TIMESTAMP, :transaction_invoice_code,'', '', :transaction_status, '', :transaction_category, :transaction_customer_name,:transaction_customer_phone_number,:transaction_customer_address,'')";

        $this->db->query($query);
        $this->db->bind('transaction_invoice_code',$data['transaction_invoice_code']);
        $this->db->bind('transaction_status',$data['transaction_status']);
        $this->db->bind('transaction_category',$data['transaction_category']);
        $this->db->bind('transaction_customer_name',$data['transaction_customer_name']);
        $this->db->bind('transaction_customer_phone_number',$data['transaction_customer_phone_number']);
        $this->db->bind('transaction_customer_address',$data['transaction_customer_address']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function postInsertDetailRow($data)
    {
        $query ="INSERT INTO ". $this->table_detail ."
                VALUES
                ('', :transaction_id, :menu_id, :transaction_detail_qty, :transaction_detail_price_total, :transaction_detail_note)";

        $this->db->query($query);
        $this->db->bind('transaction_id',$data['transaction_id']);
        $this->db->bind('menu_id',$data['menu_id']);
        $this->db->bind('transaction_detail_qty',$data['transaction_detail_qty']);
        $this->db->bind('transaction_detail_price_total',$data['transaction_detail_price_total']);
        $this->db->bind('transaction_detail_note',$data['transaction_detail_note']);
       
       
       
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function postUpdateRowByStatus($data){
        $query ="UPDATE ". $this->table ."
                SET transaction_status = :transaction_status
                WHERE transaction_id = :transaction_id";

        $this->db->query($query);
        $this->db->bind('transaction_status',$data['transaction_status']);
        $this->db->bind('transaction_id',$data['transaction_id']);
        
        $this->db->execute();

        return $this->db->rowCount();
                
    }

    public function postDeleteRow($id){
        $query ="DELETE FROM ". $this->table ."
                WHERE transaction_id = :transaction_id";

        $this->db->query($query);
        $this->db->bind('transaction_id',$id);
     
        $this->db->execute();

        return $this->db->rowCount();
                
    }
    public function postDeleteAllDetailRow($id){
        $query ="DELETE FROM ". $this->table_detail ."
                WHERE transaction_id = :transaction_id";

        $this->db->query($query);
        $this->db->bind('transaction_id',$id);
     
        $this->db->execute();

        return $this->db->rowCount();
                
    }

    

   

}

?>