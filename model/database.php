<?php
    $dsn = 'mysql:host=localhost;dbname=Scholarship';
    $username = 'ts_user';
    $password = 'pa55word';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        exit();
    }
?>