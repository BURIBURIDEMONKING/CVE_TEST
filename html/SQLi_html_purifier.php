<?php
require_once __DIR__ . '/htmlpurifier/library/HTMLPurifier.auto.php';


    $conn = mysqli_connect("127.0.0.1", "root", "qwe123", "test_db");
    $userInput = $_GET['user_input'];
    
    class SFilter extends HTMLPurifier_Filter {
        public $name = 'SFilter';
        public function preFilter($html, $config, $context) {
            $special_characters = array('#', '%', '*', '(', ')', '=','{', '}', '|','"', ',', '.');
            return str_replace($special_characters, ' ', $html);
        }
        public function getFilter($html, $config, $context) {
            return $html;
        }
    }

    $config = HTMLPurifier_Config::createDefault();
    $config->set('Filter.Custom', [new SFilter()]);
    $purifier = new HTMLPurifier($config);

    $filtered_string = $purifier->purify($userInput);

    $sql = "SELECT * FROM test_table WHERE id = ".$filtered_string;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['name'];
?>


