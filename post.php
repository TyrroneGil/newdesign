<?php
require "components/db_connection.php";
session_start();
$query = 'SELECT * from users where ID = ' . $_SESSION['id'] . '';
$result = mysqli_query($conn, $query);
$row1 = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Posting Form</title>
    <style>
        #profile img {
            width: 64px;
            height: 64px;
            
            border-radius: 100px;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-image: url("components/pics/background1.png");
        }



        nav {

            overflow: hidden;
            width: 10%;
            /*    Adjust the width of the navbar as needed */
            background-color: #1F0D52;
            color: #fff;

            box-sizing: border-box;
            height: 100vh;

        }

        ul {
            margin-top: 100px;

            flex-direction: column;
            list-style-type: none;
            text-decoration: none;

        }

        li {
            list-style-type: none;
            text-decoration: none;
            margin-right: 45px;
        }

        li a {
            list-style-type: none;
            text-decoration: none;
            display: block;
            color: white;
            text-align: center;
            width: 100%;
            padding: 14px 20px;
            text-decoration: none;
            color: #FFF;

            font-family: Archivo;
            font-size: 20 px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        .logo1 img {
            max-width: 100%;
            max-height: 100%;
            width: 272px;
            height: 236px;
            background-color: #1F0D52;
            border-radius: 60%;
            transform: translateY(-20%);
        }



        .form {

            position: absolute;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin-top: 50px;
            right: 34%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .logo img {
            
            width: 100px;
            height: 97px;

        }

        li a:hover {
            background-color: white;
            color: black;
        }
        #list{
            margin-bottom: 300px;
        }
        
    </style>
</head>
<link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<body>

    <div style="display: flex;">
        <nav>
            <h2>
                <div class="logo">
                    <center><img src="components/pics/uniqquologo.png" alt=""></center>
                </div>
            </h2>
            <ul>
                <li><a href="homepage.php"><i class="bi bi-house"></i>Home</a></li>
                <li><a href="post.php"><i class="bi bi-file-post-fill"></i>Post</a></li>
            
                <li><a href="messagingsystem.php"><i class="bi bi-chat-text-fill"></i>Messages</a></li>
                <li id="list"></li>
                <div id="profile">
                    <center>
                        <form action="profile.php" method="get">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id'];  ?>">
                            <button style="background: none;border: none;outline: none;box-shadow: none;" type="submit"><img src="<?php echo ($row1['profile_pic']==null) ? "components/pics/download.png" : $row1['profile_pic'] ?>" alt=""></button>
                        </form>
                        <li style="float:center"><a class="active" href="index.php">Logout</a></li>
                    </center>
                </div>
            </ul>
        </nav>
        <div>
            <div class="form">
                <form action="process_form.php" method="post" enctype="multipart/form-data">
                <div class="logo1"><center><img src="components/pics/uniqquologo.png" alt=""></center></div>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                    <!-- Input for Image -->
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" accept="image/*" onchange="displayImage(this);" required>
                    <img style="width:200px; height:200px; position:relative; transform:translateX(110px)" id="chosen-image" src="#" alt="Chosen Image">
        
                    <!-- Input for Description -->
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" rows="4" required></textarea>
        
                    <!-- Input for Name -->
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
        
                    <!-- Submit Button -->
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        
    </div>
</body>
<script>
    function displayImage(input) {
        const chosenImage = document.getElementById('chosen-image');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                chosenImage.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            chosenImage.src = '#';
        }
    }
</script>

</html>