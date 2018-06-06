<?php

header("Content-type: text/html;charset=utf-8");
$hostname = 'db.cs.dal.ca';
$username = 'yir';
$password = 'B00762844';
$database = 'yir';



try{
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username , $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$conn = mysqli_connect($host, $user, $password, $database);
    if (!$conn) {
    	echo "Could not connect </br>";
    }
} catch (PDOException $e) {
    $_SESSION['error'] = $e->getMessage();
    require_once 'template.php';
}
