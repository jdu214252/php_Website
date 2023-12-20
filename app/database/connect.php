<?php 

$host = 'localhost';
$db = 'myblog';
$user = 'root';
$pass = '';
$charset = 'utf8';  
$option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];


try {
    $pdo = new PDO("mysql:host=$host; dbname=$db; charset=$charset", $user, $pass, $option);
} catch (PDOException $e) {
    echo 'Error with Bd'.$e->getMessage();
}

?>




