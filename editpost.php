<?php
$title = "Edit Redirect Page";
require_once 'db/connection.php';


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['dob'];
    $phone_number = $_POST['number'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $bio = $_POST['bio'];
    $experience = $_POST['experience'];
    $id = $_POST['id'];

    $result = $user->updatePersonalDetails($name, $date, $bio, $phone_number, $address, $description, $experience, $id);

    if ($issuccess) {
        header("Location: index.php");
    } else {
        echo '<br>';
        include 'includes/errormessage.php';
    }
}
