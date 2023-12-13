<?php
require "components/db_connection.php";
require "components/navbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
         input{


background: #FFF;
width: 528px;
height: 50px;

color: #000;

text-align: left;
font-family: Archivo;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: normal;
}








 p{
    margin: 0;
 }
 textarea{
    width: 528px;
 }
       
        body{
            background-color:#1F0D52;
        }
        .formdes form {
            background-color: #D1C8EB;
            
            border-radius: 8px;
            
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

         

        input[type="submit"]:hover {
            background-color: #45a049;
        }
         p{
            color: white;
        
        text-align: center;
        
        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        font-family: Archivo;
        font-size: 40px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        }   
        
        
        .pic img{
            width: 272px;
height: 238px;
background-color: #1F0D52;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php
$query='SELECT * from `user_post` where ID='.$_POST['id'].'';
$allProducts=mysqli_query($conn,$query);
$row1 = mysqli_fetch_array($allProducts);
?>
<body style=" background-color: #D1C8EB">
    <div class="container">
    <p>Update?</p>
        <center>
            <div class="pic"><img id="image" src="<?php echo $row1['art_image'] ?>" alt=""></div>
            </center>
        <div class="formdes">
        <form action="updateback.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <label for="name">Name:</label>
        <input value="<?php echo $row1['art_title'] ?>" type="text" id="name" name="name">

        <label>Image URL:</label>
        <input value="<?php echo $row1['art_image'] ?>"  id="imageval" name="image_url">

        <label for="description">Description</label>
        <textarea name="description" id="" cols="30" rows="5"><?php echo $row1['description']  ?>   </textarea>
        <label>Price:</label>
        <input value="<?php echo $row1['price'] ?>"  name="price">
        <div class="row align-items-start">
    <div class="col">
    <button type="submit" class="btn btn-primary">Change</button>
        </form>
    </div>
    <div class="col">
     <form action="deleteback.php" method="post">
            <input type="hidden" name="profile_id">
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
  </div>
        
    
        </div>
        
    </div>

</body>
<script src="./components/javascript1.js"></script>
</html>