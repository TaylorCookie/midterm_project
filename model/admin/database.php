<?php
    $host = 'j21q532mu148i8ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $username = 'wz9cte153zivvz0m';
    $password = 'rlfk8mxcp2fsk8n1';
    $dbname = 'lg8dan5kam2jiokg';

    try {
        //$db = new PDO($dsn, $username);
        // $db = new PDO($dsn, $username, $password);
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    } catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }
?>
