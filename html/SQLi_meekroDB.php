<?php
require_once __DIR__ . '/meekrodb-2.5.1/db.class.php';

$userInput = $_GET['user_input'];

DB::$host = 'localhost';
DB::$user = 'root';
DB::$password = 'qwe123';
DB::$dbName = 'test_db';


$results = DB::query("SELECT * FROM test_table WHERE id=%d", $userInput);

if (count($results) > 0) {
    foreach ($results as $row) {
        echo "Username: " . $row["name"] . "<br>";
    }
} else {
    echo "0 results";
}
?>

