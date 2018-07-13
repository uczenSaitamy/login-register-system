<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 12.07.18
 * Time: 09:59
 */

class user
{
    private $_db;

    public $email;
    public $password; // SET TO PRIVATE LATER
    public $name;
    public $created_at;

    public function __construct($db)
    {
        $this->_db = $db;
    }

    private function passwordHash()
    {
        return ($this->password = password_hash($this->password, PASSWORD_DEFAULT)) ? true : false;
    }

    /*
     * that method is finding and setting existing user.
     */
    public function setUser()
    {
        $sql = "SELECT * FROM USERS WHERE email =:email";
        if ($query = $this->_db->prepare($sql)) {

            $query->bindParam(":email", $this->email);
            $query->execute();

            while ($row = $query->fetch()) {
                $this->password = $row['password'];
                $this->name = $row['name'];
                $this->created_at = $row['created_at'];
                return true;
            }
        } else return false;
    }

    /*
     * just finding user
     */
    public function isUser()
    {
        $sql = "SELECT * FROM USERS WHERE email =:email";
        $query = $this->_db->prepare($sql);
        $query->bindParam(":email", $this->email);
        $query->execute();
        $row = $query->rowCount();
        return ($row > 0) ? true : false;
    }

    public function passwordVerify($password)
    {
        return (password_verify($password, $this->password)) ? true : false;
    }

    private function insert()
    {
        $sql = "INSERT INTO USERS(email, password, `name`, created_at) VALUES(:email, :password, :name, :created_at)";
        if ($query = $this->_db->prepare($sql)) {
            $query->bindParam(":email", $this->email);
            $query->bindParam(":password", $this->password);
            $query->bindParam(":name", $this->name);
            $query->bindParam(":created_at", $this->created_at);

            return ($query->execute()) ? true : false;
        }
        return false;
    }

    public function create()
    {
        $this->passwordHash();
        return ($this->insert())? true : false;
    }


}