<?php
require "components/db_connection.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $description = $_POST["description"];
    $name = $_POST["name"];
    $user_id = $_POST['user_id'];

    // Handle the uploaded image
    $targetDirectory = "components/pics/uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        // Save $description, $name, and $targetFile to a database or file as needed
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $query='INSERT INTO `user_post`(`user_id`, `art_image`, `art_title`, `description`) VALUES ('.$user_id.',"'.$targetFile.'","'.$name.'","'.$description.'")';
    $result=mysqli_query($conn,$query);

    header("Location: homepage.php");
}

?>
