<?php 
session_start();
include "connection_db.php";

if (isset($_SESSION['username'])) {
    header("location:welcome.php");
}

//error_reporting(0);

$Error_Msg = " ";

////// Login ///////////
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = mysqli_query($conn , "SELECT * FROM `user` WHERE email = '$email' ");
    if ($sql->num_rows > 0) {
		$row = mysqli_fetch_assoc($sql);
        $hash = $row['password'];
            
       if (password_verify($password, $hash)) {	

            if ($row['status'] != 0) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['fullname'];
                $_SESSION['profile'] = $row['profile'];
                header("location:welcome.php"); 
            }else{

                header("location:acctivation_page.php?verifyfail");
            }

        }else{
            $Error_Msg = " Password Error !!";
        }
        
       }  else{
        $Error_Msg = "Email Error !!";
    }
}
    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Programs</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
        <legend>Login Form</legend>
            <div>
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter Email" required/>
            </div>
            <br />
            <div>
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" required/>
            </div>
            <br />
            <input type="submit" name="submit" />
            <br />
            <?php echo "<strong style='color:red; padding:10px;'>".$Error_Msg."</strong>"; ?>
        </fieldset>
        <a href="register.php">Go to Registration Page</a>
    <form>
    <br /> 

</body>
</html>