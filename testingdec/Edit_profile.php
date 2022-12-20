<?php
include "connection_db.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

$user_id = $_SESSION['user_id'];

$Error_Msg = "";

if (isset($_POST['update'])) {
    
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $pic_name= $_FILES['profile']['name'];
    $pic_type = $_FILES['profile']['type'];
    $pic_size= $_FILES['profile']['size'];
    $pic_tmpname= $_FILES['profile']['tmp_name'];

    $profile="profile/".$pic_name;
    move_uploaded_file($pic_tmpname, $profile);

    $addsql = "UPDATE user SET `fullname` = '$fullname' , `profile` = '$profile' ,`country` = '$country' where id = '$user_id'";
            if (mysqli_query($conn, $addsql)) {
                $Error_Msg = "<strong style='color:green;'> Successfully Updated</strong>";
            }else{
                $Error_Msg = "Error Try Again Please !";
            }
    }


   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>


        <form action="" method="POST" enctype="multipart/form-data">
                <fieldset>
                <?php
                    $userdata = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'");
                    if( $userdata->num_rows > 0){
                        $row = mysqli_fetch_assoc($userdata);
                    ?>
                <legend>Update Profile </legend>
                    <div>
                        <label>Full Name</label>
                        <input type="text" name="fullname" placeholder="Full Name" value="<?php echo $row['fullname']; ?>" required/>
                    </div>
                    <br />
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>" required disabled/>
                    </div>
                    <br />
                    <div>
                        <label>Upload Profile</label>
                        <input type="file" name="profile" placeholder="Profile Picture" value="<?php echo $row['profile']; ?>" required/>
                    </div>
                    <br />
                    <label>Country</label>
                    <select name="country" value="<?php echo $row['country']; ?>">
                        <option disabled>-Select One-</option>
                        <option value="pakistan" selected>Pakistan</option>
                        <option value="germany">Germany</option>
                        <option value="other">Other</option>
                    </select>
                    <br /><br>
                    <input type="submit" name="update" value="Update Data" />
                    <br />
                    <?php echo "<strong style='color:red; padding:10px; text-align:center;'>".$Error_Msg."</strong>"; ?>
                    <?php }   ?>

                    <a href="welcome.php">Back to Dashboard</a>
                </fieldset>

                <a href="index.php">Go to Login Page</a>
            <form>

    

    
</body>
</html>