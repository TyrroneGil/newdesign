<?php
require "components/db_connection.php";
$query= "DELETE FROM `likes` where image_id=".$_GET['pic_id']." and user_id = ".$_GET['user_id']."";
mysqli_query($conn, $query);
header('Location: homepage.php');




?>