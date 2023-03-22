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
    // public function insertUser($username, $email, $password)
    // {
    //     try {

    //         $result = $this->countAvailableUsers($email);

    //         if ($result['num'] > 0) {
    //             return false;
    //         } else {

    //             $new_password = md5($password . $email);

    //             //sql query to insert details of new created users of our system
    //             $sql = "INSERT INTO `users_details`(username, email, password) VALUES (:username, :email, :password)";

    //             //prepare statement for insert
    //             $statement = $this->db->prepare($sql);

    //             //bind parameters
    //             $statement->bindparam(':email', $email);
    //             $statement->bindparam(':password', $new_password);
    //             $statement->bindparam(':username', $username);

    //             //execute
    //             $statement->execute();

    //             return true;
    //         }
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }

    //function to get user details
    public function getUser($email, $password)
    {
        try {
            //the sql to query data in our database
            $sql = "SELECT * FROM `users_details` WHERE email = :email AND password = :password";

            //prepare the statement
            $statement = $this->db->prepare($sql);

            //bind parameters
            $statement->bindparam(':email', $email);
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

    //another function to get user by email
    // public function countAvailableUsers($email)
    // {
    //     try {
    //         //the sql to query data in our database
    //         $sql = "SELECT COUNT(*) AS num FROM `users_details` WHERE email = :email";

    //         //prepare the statement
    //         $statement = $this->db->prepare($sql);

    //         //bind parameters
    //         $statement->bindparam(':email', $email);

    //         //execute
    //         $statement->execute();

    //         //fetch result as it is one record that we are looking at here
    //         $result = $statement->fetch();

    //         return $result;
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();

    //         return false;
    //     }
    // }

    //function to return all the username same as the input username value
    public function selectUsername($username)
    {
        try {
            $sql = "SELECT * FROM `users_details` WHERE username = :username";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':username', $username);
            $statement->execute();
            $result = $statement->fetch();

            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }


    //function to return all the email same as the input email value
    public function selectEmail($email)
    {
        try {
            $sql = "SELECT * FROM `users_details` WHERE email = :email";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':email', $email);
            $statement->execute();
            $result = $statement->fetch();

            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    //function to update personal details in the database
    public function updatePersonalDetails($name, $date, $bio, $phone_number, $address, $description, $experience, $id, $linkedin, $github)
    {
        try {
            //sql statement to update records in a database
            $sql = "UPDATE `personal_details` SET `name`=:name, `bio`=:bio, `dob`=:date,`phone`=:phone_number,`address`=:address,`description`=:description,`experience`=:experience, `linkedin`=:linkedin, `github`=:github WHERE `id` =:id";

            //prepare the sql statement for execution
            $statement = $this->db->prepare($sql);

            //bind parameters for execution
            $statement->bindparam(':name', $name);
            $statement->bindparam(':date', $date);
            $statement->bindparam(':phone_number', $phone_number);
            $statement->bindparam(':address', $address);
            $statement->bindparam(':description', $description);
            $statement->bindparam(':bio', $bio);
            $statement->bindparam(':experience', $experience);
            $statement->bindparam(':linkedin', $linkedin);
            $statement->bindparam(':github', $github);
            $statement->bindparam(':id', $id);

            //execute the statements
            $statement->execute();

            return true;

        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    //function to get all registered attendees
    public function getPersonalDetails()
    {
        try {
            //sql statements
            $sql = "SELECT * FROM `personal_details`";

            //query data
            $result = $this->db->query($sql);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function insertNewService($name, $link, $description){
        try {
            //sql statement
            $sql = "INSERT INTO `services`(`service_name`, `service_descripition`, `service_link`) VALUES (:service_name,:service_description,:service_link)";
            //prepare sql statement
            $statement = $this->db->prepare($sql);
            //bind and execute
            $statement->bindparam(':service_name', $name);
            $statement->bindparam(':service_link', $link);
            $statement->bindparam(':service_description', $description);
            //execute statement
            $statement->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
