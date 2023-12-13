<?php
require "components/db_connection.php";
if($_POST['message']!=null){
    $sender=$_POST['sender'];
    $receiver=$_POST['receiver'];
    $message=$_POST['message'];
    $query='INSERT INTO `message`(`message`, `sender`, `receiver`,`active_id`) VALUES ("'.$message.'",'.$sender.','.$receiver.','.$receiver.')'; 
    $result=mysqli_query($conn,$query);
    header("Location: messagingsystem.php?id=$receiver");
}else{
    header("Location: messagingsystem.php");
}




?>