<?php
include "includes/header.php";

if(isset($_POST['signup']))
{
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $email=mysqli_real_escape_string($link,$email);
    $username=mysqli_real_escape_string($link,$username);
    $password=mysqli_real_escape_string($link,$password);
    $email=htmlentities($email);
    $username=htmlentities($username);
    $password=htmlentities($password);
    $password=password_hash($password,PASSWORD_BCRYPT);
    
    $sql1="select * from users where email='$email' or username='$username'";
    $res1=mysqli_query($link,$sql1);
    if(mysqli_num_rows($res1)>0)
    {
        header("Location: login.php");
        $_SESSION['message']="<div class='chip red black-text'> Account already registered</div>";
    }
    else{
        $imgname = $_FILES['img']['name'];
        $imgset = $username.$imgname;
        $img_dir = $_FILES['img']['tmp_name'];
    
        move_uploaded_file($img_dir,"upload/".$imgset);    
       
        $sql="insert into users(email,username,password,image) values('$email','$username','$password','$imgset')";
    $res=mysqli_query($link,$sql);
    if(res)
    {
        header("Location: login.php");
        $_SESSION['message']="<div class='chip green black-text'> you have been succesfully registered, Login to continue </div>";
    }
    else
        {
        header("Location: login.php");
        $_SESSION['message']="<div class='chip red black-text'> Sorry something went wrong</div>";  
 } }
}

?>
