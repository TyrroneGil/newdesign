<?php
require "components/db_connection.php";
$query = 'INSERT INTO `likes`( `image_id`, `user_id`,`user_image_id`) VALUES ('.$_GET['pic_id'].','.$_GET['user_id'].','.$_GET['user_image_id'].')';
mysqli_query($conn, $query);
header('Location: homepage.php?&page='.$_GET['page'].'');







?>