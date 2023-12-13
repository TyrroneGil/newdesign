<?php
require "components/db_connection.php";
session_start();
$query='SELECT *,a.ID as imageID, b.* from user_post a inner join users b on a.user_id = b.ID where a.ID='.$_GET['id'].';';
$allProducts=mysqli_query($conn,$query);
$row=mysqli_fetch_array($allProducts);

$query='SELECT * from users where ID ='.$_SESSION['id'].'';
$result=mysqli_query($conn,$query);
$user=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>body{
    margin-top:20px;
    background-color: #ecf0f5;
}
.box-widget {
    border: none;
    position: relative;
}
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}
.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}
.user-block img {
    width: 40px;
    height: 40px;
    float: left;
}
.user-block .username {
    font-size: 16px;
    font-weight: 600;
}
.user-block .description {
    color: #999;
    font-size: 13px;
}
.user-block .username, 
.user-block .description, 
.user-block .comment {
    display: block;
    margin-left: 50px;
}
.box-header>.box-tools {
    position: absolute;
    right: 10px;
    top: 5px;
}
.btn-box-tool {
    padding: 5px;
    font-size: 12px;
    background: transparent;
    color: #97a0b3;
}
.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.pad {
    padding: 10px;
}
.box .btn-default {
    background-color: #f4f4f4;
    color: #444;
    border-color: #ddd;
}
.box-comments {
    background: #f7f7f7 !important;
}
.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}
.box-comments .box-comment:first-of-type {
    padding-top: 0;
}
.box-comments .box-comment {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}
.img-sm, 
.box-comments .box-comment img, 
.user-block.user-block-sm img {
    width: 30px !important;
    height: 30px !important;
}
.img-sm, .img-md, 
.img-lg, .box-comments .box-comment img, 
.user-block.user-block-sm img {
    float: left;
}
.box-comments .comment-text {
    margin-left: 40px;
    color: #555;
}
.box-comments .username {
    color: #444;
    display: block;
    font-weight: 600;
}
.box-comments .text-muted {
    font-weight: 400;
    font-size: 12px;
}
.img-sm+.img-push {
    margin-left: 40px;
}
.box .form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de;
}

</style>
<?php
$query2='SELECT COUNT(comment) as count FROM `comments` WHERE image_id='.$row['imageID'].';';
$allProducts2=mysqli_query($conn,$query2);
$row3=mysqli_fetch_array($allProducts2);
$query3='SELECT COUNT(ID) as count FROM likes WHERE image_id='.$row['imageID'].';';
$allProducts5=mysqli_query($conn, $query3);
$row5=mysqli_fetch_array($allProducts5)
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="container bootstrap snippets bootdey">
<div class="col-md-8">
  <div class="box box-widget">
    <div class="box-header with-border">
      <div class="user-block">
        <img class="img-circle" src="<?php echo ($row['profile_pic']==null ? "components/pics/download.png" : $row['profile_pic'] );?>" alt="User Image">
        <span class="username"><a href="#"><?php echo $row['username'] ?></a></span>
        <span class="description">Posted - <?php echo date_format(date_create($row['date_posted']), 'M d,Y')   ?></span>
      </div>
      <div class="box-tools">
        
        <a href="homepage.php"><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button></a>
      </div>
    </div>

    <div class="box-body" style="display: block;">
      <center><img width="600" height="420" class="img-responsive pad" src="<?php echo $row['art_image']  ?>" alt="Photo"></center>
      <p><?php echo $row['description']  ?></p>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
      <span class="pull-right text-muted"><?php echo $row5['count'] ?> likes - <?php echo $row3['count']; ?> comments</span>
    </div>
    <div class="box-footer box-comments" style="display: block;">
    <?php
     $query='SELECT *,a.ID as commentID,a.user_id as userID,b.username as username, b.profile_pic as pfp FROM `comments` a inner join `users` b on a.user_id = b.ID  WHERE image_id='.$row['imageID'].';';
     $allProducts=mysqli_query($conn,$query);
     if(mysqli_num_rows($allProducts) > 0){
         while($row = mysqli_fetch_array($allProducts)){

?>
      <div class="box-comment">
        <img class="img-circle img-sm" src="<?php echo ($row['pfp']==null) ? "components/pics/download.png" : $row['pfp'] ?>" alt="User Image">
        <div class="comment-text">
          <span class="username">
          <?php
            echo $row['username'];
          ?>
          <span class="text-muted pull-right"><?php echo  date_format(date_create($row['date_commented']), 'M d,Y')  ?>
          <?php if($_SESSION['id']==$row['userID']){
            echo '<form action="deletecomment1.php" method="get">
            <input type="hidden" name="imageID" value="'. $_GET['id'].'">
            <input type="hidden" name="comment_id" value="'.$row['commentID'].' ">
            <button style="float: right;" type="submit">Delete</button>
        </form>';
          }
           ?>
          
        </span>
          </span>
          <?php
            echo $row['comment'];
          ?>
        </div>
      </div>

      <?php  
         }}
      ?>
    <div class="box-footer" style="display: block;">
     
        <img class="img-responsive img-circle img-sm" src="<?php echo ($user['profile_pic']==null) ? "components/pics/download.png" : $user['profile_pic'] ?>" alt="Alt Text">
        <div class="img-push">
            <div style="display:flex"><form action="addcomment2.php" method="post">
                <input type="hidden" name="image_id" value="<?php echo $_GET['id'] ?>">
                <input type="text" style="width: 1600px;" class="form-control input-sm" name="comment" placeholder="Press enter to post comment">
                <button style="float: right;" type="submit">Comment</button>
            </form>
        </div>
            

        </div>
      
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>