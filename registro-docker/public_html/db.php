<?php 
$ip = "192.168.30.101";
$db = "login";
$user = "root";
$pass = "122109F";

try {
$conn = new PDO("mysql:host=$ip;dbname=$db;charset=utf8", "$user", "$pass");
} catch (PDOException $e){
    die("Error: $e");
}
?>