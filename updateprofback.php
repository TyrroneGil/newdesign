<?php
require "components/db_connection.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
    $name = $_POST["name"];
    $user_id = $_POST['id'];

    // Handle the uploaded image
    $targetDirectory = "components/pics/uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        // Save $description, $name, and $targetFile to a database or file as needed
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
$query='UPDATE `users` SET `username`="'.$_POST['name'].'",`profile_pic`="'.$targetFile.'" WHERE ID='.$_SESSION['id'].'';
mysqli_query($conn,$query);
header("Location: profile.php?id=".$_SESSION['id']."");
}
?>