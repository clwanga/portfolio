<?php 

//development database connection
$host = "localhost";
$username = "root";
$password = "1234";
$dbname = "attendance_app";
$charset = "utf8mb4";

//remote database connection
// $host = "remotemysql.com";
// $username = "GZjWoWkdWk";
// $password = "Ua75aSgu7r";
// $dbname = "GZjWoWkdWk";
// $charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}

//inheritence
require_once "crud.php";
require_once "user.php";

//objects creation 
$user = new user($pdo);
$crud = new Crud($pdo);

//create user admin once. should be there once.
$user->insertUser('admin','clwanga1095@gmail.com', 'Lwanga1012');

?>