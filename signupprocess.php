<?php
include "components/db_connection.php";
$count=0;
if (isset($_POST['uname'])){
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass= $_POST['cpassword'];
    if($uname !=null && $email != null && $pass !=null && $cpass != null ){
        $query1 = 'select * from users where email = "'.$email.'"';
        $result = mysqli_query($conn,$query1);
while($row = $result->fetch_assoc()){
  $count++;
}
if($count!=1){
    if($pass == $cpass){
        $query= 'INSERT INTO `users`(`email`, `password`, `username`) VALUES ("'.$email.'","'.$pass.'","'.$uname.'")';
        $result = mysqli_query($conn,$query);
        echo '<script>alert("User succesfully added")</script>'; 
        header("Location: login.php");
    }else if ($pass != $cpass){
        header("Location: signup.php");
    }
}else{
    header("Location: signup.php");
}
    
}else{
    header("Location: login.php");
}
        
    
}else{
    header("Location: signup.php");
}













?>