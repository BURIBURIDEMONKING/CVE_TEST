<?php
    $username = "root";
    $password = "qwe123";
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=test_db;charset=utf8", $username, $password);
    
    $stmt = $pdo->prepare("SELECT * FROM test_table WHERE id = :id");
    $stmt->bindValue(":id", $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    echo $row['name'];
?>






