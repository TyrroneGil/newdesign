<?php
require "components/db_connection.php";
session_start();
$query= 'UPDATE `user_post` SET `art_title`="'.$_POST['name'].'",`description`="'.$_POST['description'].'" WHERE ID='.$_POST['id'].' ';
$allProducts=mysqli_query($conn,$query);
header("Location: profile.php?id=".$_SESSION['id']."");


?>