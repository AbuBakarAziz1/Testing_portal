<?php 
include"connection_db.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
$msg = "";

$user_id = $_SESSION['user_id'];


$sql_user = mysqli_query($conn, "SELECT * FROM user");

$sql_msg = mysqli_query($conn, "SELECT messages.* , user.fullname, user.id FROM messages , user  WHERE  messages.to_id = $user_id and user.id = messages.from_id ");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <title>Messages</title>
    <style>
        .box{
            border:2px solid black;
            padding:10px;
            width: 20%;
        }
        .container {
            border: 2px solid #dedede;
            width:90%;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            }
            
            .container::after {
            content: "";
            clear: both;
            display: table;
            }

            .container strong {
            float: left;
            width: 100%;
            margin-right: 20px;
            }

            .container strong.right {
            float: right;
            width: 100%;
            margin-right:0;
            }
    </style>
</head>
<body>
    <section class="box">
    <h2>Currently Login: <?php echo $_SESSION['username'];?></h2>
    <form id="messages" action="" method="POST">
        <label>Message to user </label>
        <select name="to_id">
        <?php  if ($sql_user->num_rows > 0) {
                while($row = mysqli_fetch_assoc($sql_user)){  ?>
            

            <option value="<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></option>
            <?php  }
        } ?>
        </select>
        
        <?php  if ($sql_msg->num_rows > 0) {
                while($row = mysqli_fetch_assoc($sql_msg)){  ?>
            <div class="container">
                <strong><?php echo $row['fullname'] ?></strong>
                <p><?php echo $row['messages'] ?></p>
            </div>
                    <?php }  }  ?>

            <br /><br />
            <input type="text" name="message" id="message" placeholder="type your message here.."  />
            <input type="submit" name="sent" id="sendbtn" value="sent"  />
            <br />
            <span><?php  echo $msg; ?></span>
            <strong style="color:green" id="successmsg"></strong>
            
        </form>
        
    </section>
    <button><a href="welcome.php">Dashboard</a></button>


    <script>

        jQuery('#messages').on('submit', function(e){
            jQuery('#sendbtn').val('Please Wait...');
            jQuery('#sendbtn').attr('disabled', true);
            jQuery.ajax({
                url:'messageaction.php',
                method:'POST',
                data: jQuery('#messages').serialize(),
                success: function(result) {
                    jQuery('#successmsg').show();
                    jQuery('#messages')['0'].reset();
                    jQuery('#sendbtn').val('sent');
                    jQuery('#sendbtn').attr('disabled', false);
                    
                }
            });
            e.preventDefault();
        });


    </script>





</body>
</html>