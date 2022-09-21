<?php

class user
{
    //private database object
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    //function to insert new users into our database
    public function insertUser($username, $email, $password)
    {
        try {

            $result = $this->getUserByUsername($username);

            if ($result['num'] > 0) {
                return false;
            } else {

                $new_password = md5($password.$username);
                //sql query to insert details of new created users of our system
                $sql = "INSERT INTO `system_users`(username, email, password) VALUES (:username, :email, :password)";

                //prepare statement for insert
                $statement = $this->db->prepare($sql);

                //bind parameters
                $statement->bindparam(':email', $email);
                $statement->bindparam(':password', $new_password);
                $statement->bindparam(':username', $username);

                //execute
                $statement->execute();

                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //function to get user details
    public function getUser($username, $password)
    {
        try {
            //the sql to query data in our database
            $sql = "SELECT * FROM `system_users` WHERE username = :username AND password = :password";

            //prepare the statement
            $statement = $this->db->prepare($sql);

            //bind parameters
            $statement->bindparam(':username', $username);
            $statement->bindparam(':password', $password);

            //execute
            $statement->execute();

            //fetch result as it is one record that we are looking at here
            $result = $statement->fetch();

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    //another function to get user by username
    public function getUserByUsername($username)
    {
        try {
            //the sql to query data in our database
            $sql = "SELECT COUNT(*) AS num FROM `system_users` WHERE username = :username";

            //prepare the statement
            $statement = $this->db->prepare($sql);

            //bind parameters
            $statement->bindparam(':username', $username);

            //execute
            $statement->execute();

            //fetch result as it is one record that we are looking at here
            $result = $statement->fetch();

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }
}
