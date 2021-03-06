<?php
//include parent class definition
include_once "models/Table.class.php";

class Admin_Table extends Table {

    public function create ($email, $password) {
        //check if e-mail is available
        $this->checkEmail($email);
        //encrypt password with MD5
        $sql = "INSERT INTO admin (email, password)
                VALUES(?, MD5(?))";
        $data = array($email, $password);
        $this->makeStatement($sql, $data);
    }

    private function checkEmail ($email) {
        $sql = "SELECT email FROM admin WHERE email = ?";
        $data = array($email);
        $this->makeStatement($sql, $data);
        $statement = $this->makeStatement($sql, $data);
        //if a user with that e-mail is found in database
        if ($statement->rowCount() === 1) {
            //throw an exception > do NOT create new admin user
            $e = new Exception("Error: '$email' already used!");
            throw $e;
        }
    }
}