<?php
include "connection_db.php";

session_start();

$Error_msg = " ";

if (isset($_GET['verifyfail'])) {
    $Error_msg="Verify Your Account First ..";
}

if (isset($_POST['activate'])) {
    $activatecode = mysqli_real_escape_string($conn, $_POST['activatecode']);

    $sql = mysqli_query($conn , "SELECT * FROM `user` WHERE acc_code = '$activatecode' ");
    if ($sql->num_rows > 0) {
		$row = mysqli_fetch_assoc($sql);
        $code = $row['acc_code'];
        $user_id = $row['id'];

        if ($activatecode == $code) {
            mysqli_query($conn , "UPDATE user SET `status` = '1' where `id` = '$user_id'");
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['fullname'];
            $_SESSION['profile'] = $row['profile'];
            header("location:welcome.php"); 
        }else {
            $Error_msg = "Enter Code is incorrect ..!";
        }
    }
    else {
        $Error_msg = "Enter Code is incorrect .!";
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activation Page</title>
</head>
<body>

    <form action="" method="POST">
    <?php echo "<strong style='color:red; padding:10px;'>".$Error_msg."</strong>"; ?>
    <br />
        <label>Activation Code</label>
        <input type="text" name="activatecode" placeholder="Enter Activation Code" required/>
        <input type="submit" name="activate" />
    </form>
    
</body>
</html>