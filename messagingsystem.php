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
    <style>
        #navbar {
            overflow: hidden;

            /*    Adjust the width of the navbar as needed */
            background-color: #1F0D52;
            color: #fff;

            box-sizing: border-box;
            height: 100%;

        }

        ul {
            margin-top: 100px;

            flex-direction: column;
            list-style-type: none;
            text-decoration: none;

        }

        li {
            margin-right: 45px;
        }

        li a {
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

        li a:hover {
            background-color: white;
            color: black;
        }

        #profile button {
            background: none;
            border: none;
            outline: none;
            box-shadow: none;
        }

        #profile img {
            width: 64px;
            height: 64px;

            border-radius: 100px;
        }

        #navbar img {
            width: 100px;
            height: 97px;
        }

        .flex-container {
            display: flex;

        }

        body {
            margin: 0;
            padding: 0;
        }

        .flex-child1 {
            margin: 0;
            padding: 0;
            width: 10%;
            height: 100.2vh;
        }

        .flex-child2 {
           margin: 0;
            width: 20%;
            flex-direction: row;
            justify-items: center;
        }
        .flex-child2 a{
            color: black;
            text-decoration: none;
            display: block;
            padding: 30px;
            background-color: white;
            margin-top: 5px;
            border: black solid 1px;

        }
            .profile_pic img{
                width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
            }
        .flex-child3 {
            flex-direction: row;
            position: relative;
            height: 100vh;
            flex: 1;
            border: 1px black solid;
            background-color: #1F0D52;

        }
        .flex-child3 input{
            margin-top: 6px;
            height: 55px;
            width: 670px;
        }



        #chat-container {
            position: relative;
            flex: 1;
            overflow-y: scroll;
            padding: 10px;
            background-color: #f2f2f2;
            height: 90vh;
            overflow: scroll;
           
        }

        .form {

            flex: 1;
            background-color: #1F0D52;
            
            right: 25%;
            position: absolute;
           
        }

        #list {
            margin-bottom: 300px;
        }

        .message-container {
            position: absolute;
            border-radius: 25px;
            background: blue;
            padding: 10px;
            margin: 30px;
            margin-bottom: 10px;
            color: white;
            width: auto;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<body>
    <div class="flex-container">

        <div class="flex-child1 magenta">
            <div id="navbar">
                <!-- Navbar content goes here -->
                <h2>
                    <center><img src="components/pics/uniqquologo.png" alt=""></center>
                </h2>
                <ul>
                    <li><a href="homepage.php"><i class="bi bi-house"></i>Home</a></li>
                    <li><a href="post.php"><i class="bi bi-file-post-fill"></i>Post</a></li>
                 
                    <li><a href="messagingsystem.php"><i class="bi bi-chat-text-fill"></i>Messages</a></li>
                    <li id="list"></li>
                    <div id="profile">
                        <center>
                            <form action="profile.php" method="get">

                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                <button type="submit"><img src="<?php echo ($row1['profile_pic'] == null) ? "components/pics/download.png" : $row1['profile_pic']  ?>" alt=""></button>
                            </form>
                            <li style="float:center"><a class="active" href="index.php">Logout</a></li>
                        </center>
                    </div>
                </ul>

            </div>
        </div>
        <div class="flex-child2 magenta">
            <?php
            $query2 = "SELECT * FROM users where ID != ".$_SESSION['id']."";
            $result2 = mysqli_query($conn, $query2);
            if (mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_array($result2)) {

            ?>
                    <div class="profile_pic"><a href="?id=<?php echo $row['ID'] ?>"><img src="<?php echo ($row['profile_pic'] == null) ? "components/pics/download.png" : $row['profile_pic'] ?>" alt=""><?php echo $row['username'] ?></a></div>

            <?php
                }
            }
            ?>
        </div>
        <?php
        if(isset($_GET['id'])){
             ?>
           <div class="flex-child3 green">
            <div id="chat-container">
            <?php
        $query3='SELECT * FROM `message` WHERE (sender='.$_SESSION['id'].' or receiver='.$_SESSION['id'].') and (sender='.$_GET['id'].') or (sender='.$_SESSION['id'].' and active_id='.$_GET['id'].') ;';
        $result4=mysqli_query($conn,$query3);
        if (mysqli_num_rows($result4) > 0) {
            while ($row1 = mysqli_fetch_array($result4)) {
        ?>
        <?php
            if($row1['sender'] == $_SESSION['id']){?>
                
                <div style="text-align:center;" class="message-container">
                    <p><?php  echo $row1['message'] ?></p>
                </div><br><br><br><br><br><br><br>

                <?php
            }else{?>
                <div style="color:black;background-color:pink;right:0;text-align:center;" class="message-container">
                    <p><?php  echo $row1['message'] ?></p>
                </div><br><br><br><br><br><br><br>

                <?php
            }
        ?>
            

            <?php
            }
        }
            ?>
                


                </div>

                <div class="form">
                    <form action="messagesend.php" method="post">
                        <input type="hidden" name="receiver" value="<?php echo $_GET['id'] ?>" >
                        <input type="hidden" placeholder="Type your message..." name="sender" value="<?php echo $_SESSION['id']; ?>">
                        
                        <input type="text" name="message" placeholder="Type your message...">
                        <button type="submit">Send</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
        <?php
        }else{
            ?>
            <div class="flex-child3 green">
            <div id="chat-container">
           
           
                    
           
                


                </div>

                <div class="form">
                    <form action="messagesend.php" method="post">
                        <input type="hidden" name="receiver" value="" >
                        <input type="hidden" placeholder="Type your message..." name="sender" value="<?php echo $_SESSION['id']; ?>">
                        <input type="text" name="message" placeholder="Type your message...">
                        <button type="submit">Send</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
            <?php

        }
        ?>
        
</body>


</html>