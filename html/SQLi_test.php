<?php
    $conn = mysqli_connect("127.0.0.1", "root", "qwe123", "test_db");
    
    $sql = "SELECT * FROM test_table WHERE id = ".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['name'];
?>






