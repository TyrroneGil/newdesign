<?php
require "components/db_connection.php";
session_start();
$user_id = $_GET['id'];
$query = 'SELECT * from users where ID = ' . $user_id . '';
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
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

        .pagination {
            position: fixed;
            bottom: 30px;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #D1C8EB;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
            width: 100%;
        }

        .profile-container {
            display: flex;

            align-items: flex-start;
            width: 100%;
        }

        .nav-bar {
            background-color: #1F0D52;
            width: 200px;
            padding: 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .nav-bar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
            margin-top: 30px;
        }

        .mini-table {
            width: 100%;
            margin-top: 10px;
            font-size: 12px;
        }

        .mini-table th,
        .mini-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-around;
            width: 100%;
        }

        .card {
            height: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            width: calc(33.33% - 20px);
            max-width: 300px;

            transition: transform 0.3s;
        }

        .card img {
            width: 100%;
            height: 240px;
            border-radius: 8px;
            background-color: white;

        }

        .card:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
                align-items: center;
            }


            .nav-bar {
                width: 100%;
                align-items: center;
            }

            .mini-table {
                text-align: center;
                margin-top: 10px;
                margin-bottom: 10px;
                font-size: 12px;
            }

            .cards-container {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
<body>


    <div class="profile-container">
        <div class="nav-bar">
            <?php
                if($_GET['id']==$_SESSION['id']){
                    ?>
                        <a href="updateprofile.php?id=<?php echo $_SESSION['id']  ?>"><img src="<?php echo ($row['profile_pic'] == null) ? "components/pics/download.png" : $row['profile_pic'] ?>" alt="Profile Picture"></a>
                    <?php
                }else{
                    ?>
                    <img src="<?php echo ($row['profile_pic'] == null) ? "components/pics/download.png" : $row['profile_pic'] ?>" alt="Profile Picture">
                <?php
                }
            ?>
            
            <span><?php echo $row['username'] ?></span>
            <!-- Mini Table in Columns -->
            <?php
            $query1 = "SELECT count(id) as count from user_post where user_id = " . $user_id . "";
            $result1 = mysqli_query($conn, $query1);
            $row2 = mysqli_fetch_array($result1);
            $query2 = "SELECT count(id) as count from comments where user_image_id = " . $user_id . "";
            $result2 = mysqli_query($conn, $query2);
            $row3 = mysqli_fetch_array($result2);
            $query3 = "SELECT count(id) as count from likes where user_image_id = " . $user_id . "";
            $result3 = mysqli_query($conn, $query3);
            $row4 = mysqli_fetch_array($result3);

            ?>
            <table class="mini-table">
                <tr>
                    <th>Post</th>
                    <th>Comments</th>
                    <th>Likes</th>
                </tr>
                <td><?php echo $row2['count'] ?></td>
                <td><?php echo $row3['count'] ?></td>
                <td><?php echo $row4['count'] ?></td>

            </table>
            <p>Joined: <?php echo date_format(date_create($row['date_joined']), 'M d,Y');
?></p>

            <a href="homepage.php"><button>Back</button></a>
        </div>

        <div class="cards-container">
            <?php
            $limit = 6; // Number of items per page

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page - 1) * $limit;

            $sql = "SELECT * FROM user_post where user_id = $user_id LIMIT $start, $limit";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display data

                while ($row = $result->fetch_assoc()) {
            ?>
                 
       
            <?php
            if($_SESSION['id']==$user_id){
                echo '<div class="card">
                <a href="showpost1.php?id='.$row['ID'].'"><img  src="'.$row['art_image'].'"/></a>
                
                </div>';
            }else{
                echo '<div class="card">
                <img  src="'.$row['art_image'].'"/>
                
                </div>';
            }
            ?>
       
                <?php
                }


                ?>





                <!-- Repeat the above three cards for additional content -->
        </div>
    </div>
<?php
                // Pagination
                $sql = "SELECT COUNT(id) as total FROM user_post where user_id = $user_id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $total_pages = ceil($row["total"] / $limit);

                echo '<div class="pagination">';
                for ($i = 1; $i <= $total_pages; $i++) {
                    $active = ($i == $page) ? "class='active'" : "";
                    echo "<a $active href='?id=$user_id&page=$i'>$i</a>";
                }
                echo '</div>';
            } else {
                echo "0 results";
            }

            $conn->close();
?>



</body>


</html>