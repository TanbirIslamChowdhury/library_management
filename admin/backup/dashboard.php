<?php
session_start();
if(!isset($_SESSION['log_user_status']) && $_SESSION['log_user_status']!==true){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>hi <?php echo $_SESSION['user']->name?></p>
    <a href="logout.php">Logout</a>
    <h1>Welcome to dashboard</h1>
</body>
</html>