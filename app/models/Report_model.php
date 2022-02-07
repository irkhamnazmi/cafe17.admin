<?php 

class Report_model {
    private $user_table = 'm_user';
    private $transaction_table = 'v_transaction_payment';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

     // user

    #date

    public function getUserRowByDate($data)
    {
        $this->db->query('SELECT * FROM ' . $this->user_table . ' WHERE DATE(user_date) = :user_date' );
        $this->db->bind('user_date',$data['date']);
        return $this->db->resultSet();


    }
    public function getUserSingleRowByDate($data)
    {
        $this->db->query('SELECT *, COUNT(user_id) AS user_all_count FROM ' . $this->user_table . ' WHERE DATE(user_date) = :user_date' );
        $this->db->bind('user_date',$data['date']);
        return $this->db->single();
    }

    #month 
    public function getUserRowByMonth($data)
    {
        $this->db->query('SELECT * FROM ' . $this->user_table . ' WHERE MONTH(user_date) = :user_month AND YEAR(user_date) = :user_year' );
        $this->db->bind('user_month',$data['month']);
        $this->db->bind('user_year',$data['year']);
        return $this->db->resultSet();


    }
    public function getUserSingleRowByMonth($data)
    {
        $this->db->query('SELECT *, COUNT(user_id) AS total FROM ' . $this->user_table . ' WHERE MONTH(user_date) = :user_month AND YEAR(user_date) = :user_year' );
        $this->db->bind('user_month',$data['month']);
        $this->db->bind('user_year',$data['year']);
        return $this->db->single();
    }

    #year

    public function getUserYear()
    {
        $this->db->query('SELECT YEAR(user_date) AS user_year FROM ' . $this->user_table . ' GROUP BY YEAR(user_date) ORDER BY YEAR(user_date) DESC' );
        return $this->db->resultSet();
    }
    public function getUserRowByYear($data)
    {
        $this->db->query('SELECT * FROM ' . $this->user_table . ' WHERE YEAR(user_date) = :user_year' );
        $this->db->bind('user_year',$data['year']);
        return $this->db->resultSet();


    }
    public function getUserSingleRowByYear($data)
    {
        $this->db->query('SELECT *, COUNT(user_id) AS total FROM ' . $this->user_table . ' WHERE YEAR(user_date) = :user_year' );
        $this->db->bind('user_year',$data['year']);
        return $this->db->single();
    }


    // transaction

    #date

    public function getTransactionRowByDate($data)
    {
        $this->db->query('SELECT * FROM ' . $this->transaction_table . ' WHERE transaction_status = "Lunas" AND DATE(transaction_date) = :transaction_date' );
        $this->db->bind('transaction_date',$data['date']);
        return $this->db->resultSet();
    }
    public function getTransactionSingleRowByDate($data)
    {
        $this->db->query('SELECT *, SUM(transaction_pay_total) AS transaction_all_pay_total, COUNT(transaction_id) AS transaction_all_count FROM ' . $this->transaction_table . ' WHERE transaction_status = "Lunas" AND DATE(transaction_date) = :transaction_date' );
        $this->db->bind('transaction_date',$data['date']);
        return $this->db->single();
    }
   

    #month

    public function getTransactionRowByMonth($data)
    {
        $this->db->query('SELECT * FROM ' . $this->transaction_table . ' WHERE transaction_status = "Lunas" AND MONTH(transaction_date) = :transaction_month AND YEAR(transaction_date) = :transaction_year' );
        $this->db->bind('transaction_month',$data['month']);
        $this->db->bind('transaction_year',$data['year']);
        return $this->db->resultSet();
    }
    public function getTransactionSingleRowByMonth($data)
    {
        $this->db->query('SELECT *,  SUM(transaction_pay_total) AS transaction_all_pay_total, COUNT(transaction_id) AS transaction_all_count FROM ' . $this->transaction_table . ' WHERE transaction_status = "Lunas" AND MONTH(transaction_date) = :transaction_month AND YEAR(transaction_date) = :transaction_year' );
        $this->db->bind('transaction_month',$data['month']);
        $this->db->bind('transaction_year',$data['year']);
        return $this->db->single();
    }

    #Year

    public function getTransactionYear()
    {
        $this->db->query('SELECT YEAR(transaction_date) AS transaction_year FROM ' . $this->transaction_table . ' GROUP BY YEAR(transaction_date) ORDER BY YEAR(transaction_date) DESC' );
        return $this->db->resultSet();
    }
    public function getTransactionRowByYear($data)
    {
        $this->db->query('SELECT * FROM ' . $this->transaction_table . ' WHERE transaction_status = "Lunas" AND YEAR(transaction_date) = :transaction_year' );
        $this->db->bind('transaction_year',$data['year']);
        return $this->db->resultSet();
    }
    public function getTransactionSingleRowByYear($data)
    {
        $this->db->query('SELECT *,  SUM(transaction_pay_total) AS transaction_all_pay_total, COUNT(transaction_id) AS transaction_all_count FROM ' . $this->transaction_table . ' WHERE transaction_status = "Lunas" AND YEAR(transaction_date) = :transaction_year' );
        $this->db->bind('transaction_year',$data['year']);
        return $this->db->single();
    }

   
  




}
