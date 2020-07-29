<?php
include "write.php";

if(isset($_POST['publish']))
{
    $username=$_SESSION['username'];
    
    $title=$_POST['title'];
    $title=mysqli_real_escape_string($link,$title);
    $title=htmlentities($title);
    
    $data=$_POST['ckeditor'];
    $data=mysqli_real_escape_string($link,$data);

    $image=$_FILES['image'];
    $img_name1=$_FILES['image']['name'];
    $img_name=rand().$username.$img_name1;
    $img_size=$_FILES['image']['size'];
    $tmp_dir=$_FILES['image']['tmp_name'];
    $type=$_FILES['image']['type'];
    if($type=="image/jpeg" || $type=="image/png" || $type=="image/jpg")
  {
    if($img_size <=2097152)
    {
      move_uploaded_file($tmp_dir,"../img/".$img_name);
      $sql="insert into posts (username,title,content,author,feature_image,view) value('$username','$title','$data','hello','$img_name','0')";
      $res=mysqli_query($link,$sql);
      if($res)
      {
      $_SESSION['message']="<div class='chip green white-text'> Post is Published</div>";
      header("Location: write.php");
      }
      else
      {
        $_SESSION['message']="<div class='chip red black-text'> Sorry,Something went wrong.</div>";
        header("Location: write.php");
      }
    }
    else
    {
      $_SESSION['message']="<div class='chip red black-text'> Sorry, Image size exceded 2mb.</div>";
        header("Location: write.php");
    }
  }
  else
  {
    $_SESSION['message']="<div class='chip red black-text'> Sorry, Image format is not supported.</div>";
    header("Location: write.php");
  }

}
?>