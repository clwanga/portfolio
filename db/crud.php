<?php

use LDAP\Result;

class Crud
{
    //private database object
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    //function to insert a new record into the users database
    public function createAccount($full_name, $username, $email, $password)
    {

        try {

            //define sql statement to be executed
            $sql = "INSERT INTO users_details(full_name,username,email,password) VALUES(:full_name, :username, :email, :password)";

            //prepare the sql statement for execution
            $statement = $this->db->prepare($sql);

            //bind all placeholders to the actual values
            $statement->bindparam(':full_name', $full_name);
            $statement->bindparam(':username', $username);
            $statement->bindparam(':email', $email);
            $statement->bindparam(':password', $password);

            $statement->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //function to get all registered attendees
    public function getAttendees()
    {
        try {
            $sql = "SELECT * FROM `users` a inner join `specialities` s on a.speciality_id = s.speciality_id";
            $result = $this->db->query($sql);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //function to return a single row of attendees details by passing the id
    public function getAttendeeDetails($id)
    {
        try {
            $sql = "SELECT * FROM `users` a inner join `specialities` s on a.speciality_id = s.speciality_id WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':id', $id);
            $statement->execute();
            $result = $statement->fetch();

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    //function to update the attendee details 
    public function updateAttendeeDetails($fname, $lname, $dob, $email, $contact, $speciality, $id)
    {
        try {
            //sql to update record
            $sql = "UPDATE `users` SET `firstname`=:fname,`lastname`=:lname,`email`=:email,`phone`=:contact,`birthdate`=:dob,`speciality_id`=:speciality WHERE id = :id";

            //prepare the sql statement for execution
            $statement = $this->db->prepare($sql);

            //bind parameters for execution
            $statement->bindparam(':fname', $fname);
            $statement->bindparam(':lname', $lname);
            $statement->bindparam(':dob', $dob);
            $statement->bindparam(':email', $email);
            $statement->bindparam(':contact', $contact);
            $statement->bindparam(':speciality', $speciality);
            $statement->bindparam(':id', $id);

            $statement->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //function that helps us delete a recordd in our users table
    public function deleteAttendeeDetails($id)
    {

        try {
            //sql to delete record in databas
            $sql = "DELETE FROM `users` WHERE id = :id";

            //prepare statement for deleting operation
            $statement = $this->db->prepare($sql);

            //bind parameters
            $statement->bindparam(':id', $id);

            //execute the sql query
            $statement->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getSpecialities()
    {
        try {
            $sql = "SELECT * FROM `specialities`";
            $result = $this->db->query($sql);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
