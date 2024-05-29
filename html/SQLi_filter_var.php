<?php
    $conn = mysqli_connect("127.0.0.1", "root", "qwe123", "test_db");
    
    $userInput = isset($_REQUEST['user_input']) ? filter_var($_REQUEST['user_input'], FILTER_SANITIZE_NUMBER_INT) : NULL;
    
    $sql = "SELECT * FROM test_table WHERE id = ".$userInput;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['name'];
?>
