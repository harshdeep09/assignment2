<?php
$email = $_POST['email'];
$password = $_POST['password'];

//Step 1 - connect to the DB
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361497',  'gc200361497', 'EDJWD_dYM4');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Step 2 - build the sql command
$sql = "SELECT * FROM admins WHERE email = :email";

//Step 3 - bind the parameters and execute
$cmd = $conn->prepare($sql);
$cmd->bindParam(':email',$email,PDO::PARAM_STR, 120);
$cmd->execute();
$admin = $cmd->fetch();

//step 4 - validate the user
if (password_verify($password, $admin['password'])){
    //excellent we have a valid password
    session_start();
    $_SESSION['email']  = $admin['email'];
    $_SESSION['userName'] = $admin['userName'];
    header('location:default.php');
}
else{
    header('location:login.php?invalid=true');
    exit();
}

//step 5 - disconnect from the db
$conn=null;
?>