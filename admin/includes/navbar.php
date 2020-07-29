<?php
include "includes/header.php";
if(isset($_SESSION['username']))
{
?>

<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import Materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="../css/main.css" />
<style>
footer,header,.main{
    padding-left:300px;
}
@media(max-width:992px)
{
    footer,header,.main{
    padding-left:0px;
}}
 </style>   

  <!--Let Browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Blogging site for selling items </title>
</head>

<body>
<nav class="teal">
<div class="nav-wrapper">
<div class="container">
<a href="" class="brand-logo center"> SHAREFREE </a>
<a href="" class="button-collapse show-on-large" data-activates="sidenav">
    <i class="material-icons">menu</i></a>
</div>
</div>
</nav>

<ul class="side-nav fixed" id="sidenav">
<li>
<div class="user-view">
<div class="background">
<img src="../img/img8.jpg" alt="" class="responsive-img">
</div>
<?php
$username = $_SESSION['username'];
$pic = "select image from users where username = '$username'";
$result = mysqli_query($link,$pic);
while($roler = mysqli_fetch_array($result))
{
?>
<a href=""><img src="upload/<?php echo $roler['image'];?>" alt="" class="circle"></a>
<?php
}
?>
<span class="name white-text"><?php echo $_SESSION['username'];  ?></span>
<span class="email white-text">
<?php
$user=$_SESSION['username'];
$sql = "select email from users where username='$user'";
$res = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($res);
echo $row['email'];
?>
</span>
</div>
</li>
<li>
<a href="dashboard.php">Dashboard</a>
</li>
<li>
<a href="post.php">Posts</a>
</li>
<li>
<a href="image.php">Images</a>
</li>
<li>
<a href="comments.php">Comments</a>
</li>
<li>
<a href="setting.php">settings</a>
</li>
<div class="divider">

</div>
<li>
<a href="logout.php">Logout</a>
</li>
</ul>

<?php
}
else
{
  $_SESSION['message']="<div class='chip red black-text'>Login To Continue</div>";
  header("Location: ../login.php");
}
?>