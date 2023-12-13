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
    <style>
        .pagination {
            position: fixed;
            bottom: 30px;
            right: 50%;


        }

        .pagination a {
            padding: 8px 16px;
            text-decoration: none;
            color: black;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #1F0D52;
            color: white;
            border: 1px solid #1F0D52;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        .everything {
            margin: 10px;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #D1C8EB;
        }

        #navbar {
            overflow: hidden;
            width: 10%;
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

        #content {
            width: 80%;
            /* Adjust the width of the content area as needed */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start;

            box-sizing: border-box;
        }

        .card {
            border-radius: 20px;
            background-color: whitesmoke;
            width: 400px;
            height: auto;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            margin-left: 30px;
            width: 333px;
            height: 250px;
            border-radius: 20px;

        }


        .profile {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .profile img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .buttons button {


            background: none;
            border: none;
            outline: none;
            box-shadow: none;
        }

        .card-body {
            margin-left: 10px;
            height: auto;
            width: auto;

        }

        .card-content {

            height: auto;
            display: flex;
            justify-content: space-evenly;
        }

        .like-btn,
        .comment-btn {
            cursor: pointer;
            color: #333;
        }

        #list {
            margin-bottom: 300px;
        }
    </style>
</head>
<link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<body>
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

    <?php if(isset($_GET['page'])){


?>
<div id="content">
        <?php
        $limit = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $query = 'SELECT *,a.ID as imageID, b.*,b.ID as userID1, b.profile_pic as pfp from user_post a inner join users b on a.user_id = b.ID LIMIT ' . $start . ' , ' . $limit . ';';
        $allProducts = mysqli_query($conn, $query);
        if (mysqli_num_rows($allProducts) > 0) {
            while ($row = mysqli_fetch_array($allProducts)) {

                $query2 = 'SELECT COUNT(comment) as count FROM `comments` WHERE image_id=' . $row['imageID'] . ';';
                $allProducts2 = mysqli_query($conn, $query2);
                $row3 = mysqli_fetch_array($allProducts2);
        ?>
                <!-- Cards content goes here -->
                <div class="card">
                    <div class="everything">
                        <div class="profile">
                            <form action="profile.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $row['userID1'] ?>">
                                <button style="background: none;border: none;outline: none;box-shadow: none;" type="submit"><img src="<?php echo ($row['pfp'] == null) ? "components/pics/download.png" : $row['pfp']  ?>" alt=""></button>
                            </form>
                            <span><?php echo $row['username']  ?></span>
                        </div>
                        <img src="<?php echo $row['art_image']  ?>" alt="Card Image">
                        <div class="card-body">
                            <div class="buttons">

                                <?php
                                $query4 = 'select count(image_id) as checkers from likes where user_id=' . $_SESSION['id'] . ' and image_id = ' . $row['imageID'] . '';
                                $result = mysqli_query($conn, $query4);
                                $row4 = mysqli_fetch_array($result);
                                $count1 = $row4['checkers'];
                                $likescounter = 'SELECT count(image_id) as likes from likes where image_id = ' . $row['imageID'] . '';
                                $result3 = mysqli_query($conn, $likescounter);
                                $row6 = mysqli_fetch_array($result3);
                                if ($count1 == 0) {
                                    echo '<form action="createlike.php" method="get">
                                    <input type="hidden" name="user_image_id" value=" ' . $row['userID1'] . '">
                                    <input type="hidden" name="pic_id" value="' . $row['imageID'] . '">
                                    <input type="hidden" name="user_id" value="' . $_SESSION['id'] . '">
                                    <input type="hidden" name="page" value="' . $_GET['page'] . '">
                                     <a>Likes:' . $row6['likes'] . '</a>
                                    <button type="submit"><i class="bi bi-heart"></i></button>
                                  </form>';
                                } else if ($count1 == 1) {
                                    echo '<form action="unlike.php" method="get">
                                    <input type="hidden" name="pic_id" value="' . $row['imageID'] . '">
                                    <input type="hidden" name="user_id" value="' . $_SESSION['id'] . '">
                                    <input type="hidden" name="page" value="' . $_GET['page'] . '">
                                     <a>Likes:' . $row6['likes'] . '</a>
                                    <button type="submit"><i class="bi bi-heart-fill"></i></button>
                                  </form>';
                                }
                                ?>

                            </div>
                            <div class="card-content">
                                <span><b><?php echo $row['username']  ?></b></span>
                                <span><?php echo $row['description'] ?></span>
                            </div>
                            <span><a href="show.php?id=<?php echo $row['imageID'] ?>">View</a> <?php echo $row3['count']  ?> comments</span>
                            <form action="addcomment1.php" method="post">
                                <input type="hidden" name="user_image_id" value="<?php echo $row['userID1'] ?>">
                                <input type="hidden" name="image_id" value="<?php echo $row['imageID'] ?>">
                                <input type="hidden" name="page" value="<?php echo $_GET['page']  ?> ">
                                <input placeholder="add comments" name="comment" type="text">
                                <button type="submit">comment</button>
                            </form>
                        </div>
                    </div>
                </div>

        <?php }
        } ?>



        <!-- Add more cards as needed -->

    </div>


    </div>
    <?php
    $sql = "SELECT COUNT(id) as total FROM user_post";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_pages = ceil($row["total"] / $limit);

    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $page) ? "class='active'" : "";
        echo "<a $active href='?&page=$i'>$i</a>";
    }
    echo '</div>';


    ?>


<?php
    }else{
        ?>
<div id="content">
        <?php
        $limit = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $query = 'SELECT *,a.ID as imageID, b.*,b.ID as userID1, b.profile_pic as pfp from user_post a inner join users b on a.user_id = b.ID LIMIT ' . $start . ' , ' . $limit . ';';
        $allProducts = mysqli_query($conn, $query);
        if (mysqli_num_rows($allProducts) > 0) {
            while ($row = mysqli_fetch_array($allProducts)) {

                $query2 = 'SELECT COUNT(comment) as count FROM `comments` WHERE image_id=' . $row['imageID'] . ';';
                $allProducts2 = mysqli_query($conn, $query2);
                $row3 = mysqli_fetch_array($allProducts2);
        ?>
                <!-- Cards content goes here -->
                <div class="card">
                    <div class="everything">
                        <div class="profile">
                            <form action="profile.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $row['userID1'] ?>">
                                <button style="background: none;border: none;outline: none;box-shadow: none;" type="submit"><img src="<?php echo ($row['pfp'] == null) ? "components/pics/download.png" : $row['pfp']  ?>" alt=""></button>
                            </form>
                            <span><?php echo $row['username']  ?></span>
                        </div>
                        <img src="<?php echo $row['art_image']  ?>" alt="Card Image">
                        <div class="card-body">
                            <div class="buttons">

                                <?php
                                $query4 = 'select count(image_id) as checkers from likes where user_id=' . $_SESSION['id'] . ' and image_id = ' . $row['imageID'] . '';
                                $result = mysqli_query($conn, $query4);
                                $row4 = mysqli_fetch_array($result);
                                $count1 = $row4['checkers'];
                                $likescounter = 'SELECT count(image_id) as likes from likes where image_id = ' . $row['imageID'] . '';
                                $result3 = mysqli_query($conn, $likescounter);
                                $row6 = mysqli_fetch_array($result3);
                                if ($count1 == 0) {
                                    echo '<form action="createlike1.php" method="get">
                                    <input type="hidden" name="user_image_id" value=" ' . $row['userID1'] . '">
                                    <input type="hidden" name="pic_id" value="' . $row['imageID'] . '">
                                    <input type="hidden" name="user_id" value="' . $_SESSION['id'] . '">
                                    
                                     <a>Likes:' . $row6['likes'] . '</a>
                                    <button type="submit"><i class="bi bi-heart"></i></button>
                                  </form>';
                                } else if ($count1 == 1) {
                                    echo '<form action="unlike1.php" method="get">
                                    <input type="hidden" name="pic_id" value="' . $row['imageID'] . '">
                                    <input type="hidden" name="user_id" value="' . $_SESSION['id'] . '">
                                    
                                     <a>Likes:' . $row6['likes'] . '</a>
                                    <button type="submit"><i class="bi bi-heart-fill"></i></button>
                                  </form>';
                                }
                                ?>

                            </div>
                            <div class="card-content">
                                <span><b><?php echo $row['username']  ?></b></span>
                                <span><?php echo $row['description'] ?></span>
                            </div>
                            <span><a href="showpost.php">View</a> <?php echo $row3['count']  ?> comments</span>
                            <form action="addcomment.php" method="post">
                                <input type="hidden" name="user_image_id" value="<?php echo $row['userID1'] ?>">
                                <input type="hidden" name="image_id" value="<?php echo $row['imageID'] ?>">
                                <input placeholder="add comments" name="comment" type="text">
                                <button type="submit">comment</button>
                            </form>
                        </div>
                    </div>
                </div>

        <?php }
        } ?>



        <!-- Add more cards as needed -->

    </div>


    </div>
    <?php
    $sql = "SELECT COUNT(id) as total FROM user_post";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_pages = ceil($row["total"] / $limit);

    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $page) ? "class='active'" : "";
        echo "<a $active href='?&page=$i'>$i</a>";
    }
    echo '</div>';


    ?>
        <?php
    }  ?>
</body>

</html>