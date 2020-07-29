<?php
include "includes/header.php";
if(!isset($_SESSION['username']))
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
  <!--Let Browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Blogging site for selling items </title>
</head>

<body style="background-image:url('../img/img12.jpg'); background-size:cover">
<div class="row" style="margin-top:100px">
<div class="col l6 offset-l3 m8 offset-m2 s12">
    <div class="card-panel center grey lighten-2" style="margin-bottom:0px">
    <ul class="tabs grey lighten-2">
    <li class="tab">
<a href="#login" class="black-text">Login</a>
</li>
<li class="tab">
<a href="#signup" class="black-text">signup</a>
</li>
</ul>
</div>

</div>
<!--Sign up and login-->
<div class="col l6 offset-l3 m8 offset-m2 s12" id="login">
<div class="card-panel center red lighten-3"style="margin-top:1px"> 
<h5>Login to Continue</h5>
<?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

?>
<form action="logincheck.php" method="post" enctype="multipart/form-data">
<div class="input-field">
    <input type="text" name="username" id="username" placeholder="username">
</div>
<div class="input-field">
<input type="password" name="password" id="password" placeholder="password">
</div>
<input type="submit" name="login" value="Login" class="btn">
</form>
</div>
</div>
<div class="col l6 offset-l3 m8 offset-m2 s12" id="signup">
<div class="card-panel center red lighten-3"style="margin-top:1px">
<h5>Sign up Now</h5>
<form action="signup.php" method="post" enctype="multipart/form-data">
<div class="input-field">
    <input type="email" name="email" id="email" placeholder="Enter Email" class="validate" >
    <label for="email" data-error="Invalid Email Format" data-success="valid email"></label>
</div>
<div class="input-field">
    <input type="text" name="username" id="username" placeholder="username">
</div>
<div class="input-field">
<input type="password" name="password" id="password" placeholder="password">
</div>
    <div class="input-field file-field">
    <div class="btn">
    Upload File
    <input type="file" name="img">
    </div>
    <div class="file-path-wrapper">
    <input type="text" class="file-path" placeholder="Upload profile photo">
    </div>
    </div>
<input type="submit" name="signup" class="btn" value="signup">
</div>
</form>
</div>
</div>
</div>


<?php
include "includes/footer.php";
}
else{
    header("Location: dashboard.php");
}
?>
