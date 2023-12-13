<?php
session_start();
require 'components/db_connection.php';

$query = 'select * from `users` where ID=' . $_SESSION['id'] . '';
$allProducts = mysqli_query($conn, $query);
$row1 = mysqli_fetch_array($allProducts);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    
    button {
      background: none;
      border: none;
      outline: none;
      box-shadow: none;
    }

    ul {
      list-style-type: none;

      width: 10%;
      border: 1px solid #555;
      background-color: #1F0D52;
      height: 100%;
      /* Full height */
      position: fixed;
      /* Make it stick, even on scroll */
      overflow: auto;
      /* Enable scrolling if the sidenav has too much content */
    }

    li {
      text-align: center;
      justify-items: center;

    }

    li a {
      display: block;
      color: white;
      text-align: center;
      width: 100%;
      padding: 14px 20px;
      text-decoration: none;
      color: #FFF;

      text-align: center;
      font-family: Archivo;
      font-size: 20 px;
      font-style: normal;
      font-weight: 400;
      line-height: normal;
    }

    img {
      margin-top: 20px;
      width: 97px;
      height: 97px;
      flex-shrink: 0;
      margin-bottom: 20px;
    }

    /* Change the link color on hover */
    li a:hover {
      background-color: white;
      color: black;
    }

    #list {
      margin-bottom: 350px;
    }
    
    .profile img {
      width: 64px;
      height: 64px;
      flex-shrink: 0;



      border-radius: 64px;
    }

    .des img {
      width: 25px;
      height: 25px;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <title>Document</title>
</head>

<body>
  
  <nav>
    <ul>
      <li><img src="components/pics/uniqquologo.png" alt=""></li>
      <li><a href="post.php"><i class="bi bi-file-post-fill"></i>Post</a></li>
      <li><a href="#contact"><i class="bi bi-compass-fill"></i>Discover</a></li>
      <li><a href="#contact"><i class="bi bi-chat-text-fill"></i>Messages</a></li>
      <li id="list"><a href="#contact"><i class="bi bi-bell-fill"></i>Notifications</a></li>
      

      <div class="profile">
        <center>
          <form action="profile.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
            <button type="submit"><img src="<?php echo ($row1['profile_pic'] == null) ? "components/pics/download.png" : $row1['profile_pic'] ?>" alt=""></button>
          </form>
        </center>
      </div>
      <li style="float:center"><a class="active" href="logout.php">Logout</a></li>
    </ul>

  </nav>

</body>

</html>