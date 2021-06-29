<?php 

class User_model{
    private $title = 'Cafe 17 - Purwokerto';
    private $email;


     /**
     * Get the value of title
     */ 



    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }
}

?>
