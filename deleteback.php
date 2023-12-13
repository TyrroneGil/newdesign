<?php
session_start();
require "components/db_connection.php";
$query='DELETE from `user_post` where ID = '.$_POST['id'].'';
mysqli_query($conn,$query);
header("Location: profile.php?id=".$_SESSION['id']."");

?>