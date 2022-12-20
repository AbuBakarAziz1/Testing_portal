<?php 

include"connection_db.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

$user_id = $_SESSION['user_id'];

    $to_id = mysqli_real_escape_string($conn, $_POST['to_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql_message = "INSERT INTO `messages`(`id`, `from_id`, `to_id`, `messages`) VALUE ('','$user_id' , '$to_id', '$message')";

    $stmt=$conn->prepare($sql_message);
    $stmt->execute();
            

?>