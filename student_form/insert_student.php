<?php
    require('../model/database.php');

    $studentNumber = $_POST['studentNumber'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $classStatus = $_POST['classStatus'];
    $cumulativeGpa = $_POST['cumulativeGpa'];
    $gpaSemester = $_POST['gpaSemester'];
    $credits = $_POST['credits'];

    global $message;
    
    $eligibleDate = date("1997-01-01");
    if($dateOfBirth >= $eligibleDate && $credits >= 12 && $cumulativeGpa >= 3.2){
        $eligible = 1;
        $message = 'You qualify for the scholarship! You will be notified at the end of the semester if you have been awarded the scholarship!';
        include('../email/sendEmail.php');
    }
    else{
        $eligible = 0;
        $message = "We regret to inform you that you do not qualify for the scholarship.";
        include('../email/sendEmail.php');
    }


    global $db;
    $query = "INSERT INTO `Student` (`studentNumber`, `firstName`, `lastName`, `phoneNumber`, `email`, `gender`, `dateOfBirth`, `classStatus`, `cumulativeGpa`, `gpaSemester`, `credits`, `eligible`) VALUES ('$studentNumber', '$firstName', '$lastName', '$phoneNumber', '$email', '$gender', '$dateOfBirth', '$classStatus', '$cumulativeGpa', '$gpaSemester', '$credits', '$eligible');";
    $result = $db->query($query);
    //echo $query;
    if(!$result){
        echo '<script>alert("Please Enter Valid Information!")</script>';
    }
    else{
        header("Location: add_success.php");
        exit;
    }
?>