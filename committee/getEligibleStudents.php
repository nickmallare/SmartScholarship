<?php
    require("../model/database.php");
    $message = 'Congratulations, you have been awarded the scholarship and refunded any balance you have already paid!';
    include('../email/sendEmail.php');
    global $db;
    $sth = $db->prepare("SELECT * FROM Student WHERE eligible=1 ORDER BY cumulativeGpa DESC");
    $sth->execute();

    /* Fetch all of the remaining rows in the result set */
 
    $result = $sth->fetchAll();
    echo json_encode($result);
?>