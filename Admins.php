<?php
$pageTitle=' Page';
require_once('header.php');
?>

<main class="container">
    <h1>Albums</h1>
    <?php

    //validate if the user is active
    if (!empty($_SESSION['email']))
        echo '<a href="registration.php">Add a new Admin</a>';
    ?>

<?php
//Step 1 - connect to the DB
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361497',  'gc200361497', 'EDJWD_dYM4');
//Step 2 - create a SQL command
$sql = "SELECT * FROM admins";
//prepare and execute the SQL command
$cmd = $conn->prepare($sql);
$cmd->execute();
//store the results in a variable
$admins = $cmd->fetchAll();
//close the DB connection
$conn=null;

echo '<table class="table table-striped table-hover"><tr>
                        <th>Email</th>
                        <th>Username</th>';

if (!empty($_SESSION['email'])){
            echo '<th>Edit</th>
                  <th>Delete</th></tr>';
}
foreach($admins as $admin)
{
    echo '<tr><td>'.$admin['email'].'</td>
              <td>'.$admin['username'].'</td>';
    if (!empty($_SESSION['email'])){
        echo '<td><a href="registration.php?email='.$admin['email'].'"
                                class="btn btn-primary">Edit</a></td>
                      <td><a href="deleteAdmin.php?email='.$admin['email'].'" 
                                class="btn btn-danger confirmation">Delete</a></td></tr>';
    }


}

?>

    <?php
    require_once ('footer.php');
    ?>



