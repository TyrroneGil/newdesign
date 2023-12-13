<?php
require "components/db_connection.php";
$query = 'Delete from `comments` where ID = '.$_GET['comment_id'].'';
mysqli_query($conn,$query);
$imageID=$_GET['imageID'];
header("Location: show.php?id=$imageID");




?>