<?php
include "connection_db.php";

session_start();

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <img src="<?php echo $_SESSION['profile']; ?>" style="border-radius:50%" width="80px" height="80px" />
    <h2>Hey, Welcome <?php echo $_SESSION['username'];?></h2>
    <button><a href="Edit_profile.php">Edit Profile</a></button>
    <button><a href="messages.php">Messages</a></button>


    <button><a href='logout.php'>Logout</a></button>
    
</body>
</html>