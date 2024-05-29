<?php
$conn = mysqli_connect("127.0.0.1", "root", "qwe123", "test_db");
$userInput = $_GET['user_input'];

function test_checkdate($date) {
    $time = strtotime($date);
    $m = date('n', $time);
    $d = date('j', $time);
    $y = date('Y', $time);

    return checkdate($m, $d, $y) ? $time : false;
}

if (!test_checkdate($userInput)) {
    echo "Invalid date format.";
    exit;
}

$userInputEscaped = mysqli_real_escape_string($conn, $userInput);
$sql = "SELECT * FROM test_table WHERE DATE(date) = '" . $userInputEscaped . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "Date: " . $row['date'];

?>


