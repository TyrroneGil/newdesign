<?php
include "components/db_connection.php";
session_start();
$email= $_POST['email'];
$password=$_POST['pass'];
$count=0;
$query = 'SELECT * FROM `users` WHERE email = "'.$email.'" and password ="'.$password.'";';
$result = mysqli_query($conn,$query);
while($row = $result->fetch_assoc()){
    $_SESSION['username']=$row['username'];
    $_SESSION['id']=$row['ID'];
    $count++;
}
if($count==1){
    
    $query = 'Update `users` set `status` = "logged" where ID = "'.$_SESSION['id'].'" ';
    mysqli_query($conn,$query);
    header("Location: homepage.php");
}else{
    header("Location: login.php");
}



?>