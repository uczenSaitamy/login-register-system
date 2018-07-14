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

    /*
     * password hashing
     */

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
     * checking if the user exists in the database
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

    /*
     * checking if the given password matches the account
     */

    public function passwordVerify($password)
    {
        return (password_verify($password, $this->password)) ? true : false;
    }

    /*
     * inserting user into database
     */

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

    /*
     * public method for running password hash and inserting user into a database
     */

    public function create()
    {
        $this->passwordHash();
        return ($this->insert()) ? true : false;
    }

    /*
     * checking length of given string
     */

    public function checkEmailLength()
    {
        return (strlen($this->email) > 7 && strlen($this->email) < 101)? true  : false;
    }

    public function checkPasswordLength()
    {
        return (strlen($this->password) > 5 && strlen($this->password) < 101)? true  : false;
    }
}