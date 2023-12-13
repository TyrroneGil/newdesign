<?php
session_start();
require "components/db_connection.php";
if($_POST['comment']!=null){
    $imageID=$_POST['image_id'];
$userId=$_SESSION['id'];
$query='INSERT INTO `comments`(`image_id`, `user_id`, `comment`,`user_image_id`) VALUES ("'.$imageID.'","'.$userId.'","'.$_POST['comment'].'","'.$userID1.'")';
mysqli_query($conn,$query);
header("Location: showpost.php?pic_id=$imageID");
}else if($_POST['comment']==""){
    $imageID=$_POST['image_id'];
    header("Location: showpost.php?pic_id=$imageID");
}





















?>
