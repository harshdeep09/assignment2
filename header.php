<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle ?></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

</head>
<body>

<nav class="nav navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="default.php" class="navbar-brand">Home</a></li>


        <?php
        session_start();


        if (empty($_SESSION['email']))
        {
            echo '<li><a href="Admins.php">View Admins</a></li>
                  
                  <li><a href="login.php">Login</a></li>';
        }


        else
        {
            echo '<li><a href="Admins.php">Change Or  View Admins</a></li>
                  <li><a href="registration.php">Register For New Admin</a></li>
                  <li><a href="logout.php">Logout</a></li>';
        }
        ?>
    </ul>
</nav>