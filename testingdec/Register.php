<?php 
include "connection_db.php";

if (isset($_SESSION['username'])) {
    header("location:index.php");
}

//error_reporting(0);

$Error_Msg = " ";

////// Register ///////////

if (isset($_POST['register'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    date_default_timezone_set("Asia/karachi");
    $time = date('Y-m-d h:i:s');

    $profile = " null";

    $rcode = rand(100,1000);
    
    if ($password == $cpassword) {
        $hashpass = password_hash($password , PASSWORD_DEFAULT);
        $check = mysqli_query($conn, "SELECT * from user where email = '$email' ");
        if (!$check->num_rows > 0) {
           $row = mysqli_fetch_assoc($check);

           $addsql = "INSERT INTO user (`id`, `fullname`, `email`, `password`, `profile`, `acc_code`, `status`, `role`, `country`, `time`) VALUES ('' , '$fullname', '$email', '$hashpass','$profile','$rcode','0','user','$country','$time')";
            if (mysqli_query($conn, $addsql)) {
                $Error_Msg = "<strong style='color:green;'>User Successfully Register</strong>";
            }else{
                $Error_Msg = "Error Try Again Please !";
            }
        }else {
            $Error_Msg = "Email Already Exsit !!";
        }
        
    }else{
        $Error_Msg = "Password Not Match !!";
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
    <form action="" method="POST">
        <fieldset>
        <legend>Register Form</legend>
            <div>
                <label>Enter Full Name</label>
                <input type="text" name="fullname" placeholder="Enter Full Name" required/>
            </div>
            <br />
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
            <div>
                <label>Confirm Password</label>
                <input type="password" name="cpassword" placeholder="Enter Confirm Password" required/>
            </div>
            <br />
            <label>Country</label>
            <select name="country">
                <option disabled>-Select One-</option>
                <option value="pakistan" selected>Pakistan</option>
                <option value="germany">Germany</option>
                <option value="other">Other</option>
            </select>
            <br />
            <input type="submit" name="register" />
            <br />
            <?php echo "<strong style='color:red; padding:10px; text-align:center;'>".$Error_Msg."</strong>"; ?>
        </fieldset>

        <a href="index.php">Go to Login Page</a>
    <form>
</body>
</html>