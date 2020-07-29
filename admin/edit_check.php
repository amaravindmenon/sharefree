<?php
include "write.php";
?>

<?php
if(isset($_POST['update']))
{
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($link,$id);
    $id=htmlentities($id);

    $title=$_POST['title'];
    $title=mysqli_real_escape_string($link,$title);
    $title=htmlentities($title);

    $data=$_POST['ckeditor'];
    $data=mysqli_real_escape_string($link,$data);

    $user= $_SESSION['username'];
    $user=mysqli_real_escape_string($link,$user);
    $user=htmlentities($user);

    $sql = "update posts set title = '$title' , content = '$data' where id= $id and username='$user'";
    $res=mysqli_query($link,$sql);
    if($res)
    {
    $_SESSION['message']="<div class='chip green white-text'>Post is Updated</div>";
    header("Location: dashboard.php");
    }
    else
    {
    $_SESSION['message']="<div class='chip red black-text'>Sorry Something went wrong</div>";
    header("Location: dashboard.php");
    }    
}
include "includes/footer.php";
?>