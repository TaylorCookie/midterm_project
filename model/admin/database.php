<?php
    $dsn = 'mysql:host=lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $username = 'wsmqzoye8zau43y6';
    $password = 'vn5gbfr6bdt99lpn';

    try {
        //$db = new PDO($dsn, $username);
        $db = new PDO($dsn, $username, $password);

    } catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }
?>
