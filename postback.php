<?php
session_start(); 
include 'components/db_connection.php';
if(isset($_POST)){
    $query='INSERT INTO `user_post`(`user_id`, `art_image`, `art_title`, `description`,`price`) VALUES ("'.$_POST['user_id'].'","'.$_POST['imageurl'].'","'.$_POST['title'].'","'.$_POST['description'].'", "'.$_POST['price']. '"); ';
mysqli_query($conn,$query);

header('location:homepage.php');
}









?>