<?php

if (!empty($_GET['email']) ) {

    $email = $_GET['email'];
    //Step 1 - connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361497',  'gc200361497', 'EDJWD_dYM4');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // turn on the error handling


    //Step 2 - create the SQL statement
    $sql = "DELETE FROM admins WHERE email = :email";

    //Step 3 - prepare and execute the sql statement
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);
    $cmd->execute();

    //Step 4 - disconnect from the DB
    $conn = null;
}

//step 5 - redirect back to the albums.php page
header('location:Admins.php');
?>