<?php
    $hostname = "localhost";
    $username = "root";
    $senha = "";
    $database = "mawi";

    try {
        $pdo = new PDO("mysql: host=$hostname; dbname=$database", $username, $senha);
    } catch (PDOException $erro) {
        echo $erro->getMessage();
    }
?>