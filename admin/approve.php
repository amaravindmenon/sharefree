<?php
include "includes/header.php";
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($link,$id);
    $id=htmlentities($id);
    $sql="update comment set status=1 where id=$id";
    $res=mysqli_query($link,$sql);
    if($res)
    {
        echo"<div class='chip green black-text'> Comment approved </div>";
    }
    else{
        echo"<div class='chip red black-text'> Something went wrong </div>";
    }
}

?>