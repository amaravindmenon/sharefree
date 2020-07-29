<?php
include "includes/navbar.php";
?>
<div class="main">
<div class="card-panel">
<h5 class="center"><u>SETTINGS</u></h5><br />
<?php
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);  
}
?>
<br /><br />
<form action="setting.php" method="POST" enctype="multipart/form-data">
Change Profile Photo <input type="file" name="img">
<div class="center">
<input type="submit" name="updateIMG" value="UPDATE IMAGE" class="btn">
</div>

<input type="password" name="password" placeholder="change password">
<input type="password" name="con_password" placeholder="confirm password">
<div class="center">
<input type="submit" name="update" value="Change Password" class="btn">
</div>
</form>
</div>
</div>
<?php
include "includes/footer.php";
?>

<?php
if(isset($_POST['updateIMG']))
{
    $username=$_SESSION['username'];
    $res89=mysqli_query($link,"select * from users where username=$username");
	$row90=mysqli_fetch_array($res89);	
    $row90= mysqli_fetch_array(mysqli_query($link,"Select image from users where username='$username'"));
	@unlink('upload/'.$row90["image"]);

        $imgname = $_FILES['img']['name'];
        $imgset = $username.$imgname;
        $img_dir = $_FILES['img']['tmp_name'];
    
        move_uploaded_file($img_dir,"upload/".$imgset);

        $sqlimg="update users set image='$imgset' where username='$username'";
        $resimg=mysqli_query($link,$sqlimg);
        if($resimg)
        {
        $_SESSION['message']="<div class='chip green black-text'> Profile image has been changed </div>";
        header("Location:setting.php");
        }
        else
        {
            $_SESSION['message']="<div class='chip red black-text'> Something went wrong </div>";
        header("Location:setting.php");
        }
}
?>

<?php
if(isset($_POST['update']))
{
    
    $password=$_POST['password'];
    $password=mysqli_real_escape_string($link,$password);
    $password=htmlentities($password);

    $con_password=$_POST['con_password'];
    $con_password=mysqli_real_escape_string($link,$con_password);
    $con_password=htmlentities($con_password);
    if($con_password===$password)
    {
        $username=$_SESSION['username'];
        $password=password_hash($password,PASSWORD_BCRYPT);

        $sql="update users set password='$password' where username='$username'";
        $res=mysqli_query($link,$sql);
        if($res)
        {
        $_SESSION['message']="<div class='chip green black-text'> Password changed successfully </div>";
        header("Location:setting.php");
        }
        else
        {
            $_SESSION['message']="<div class='chip red black-text'> Something went wrong </div>";
        header("Location:setting.php");
        }
    }
    else
    {
        $_SESSION['message']="<div class='chip red black-text'> Sorry, password mismatch, try again </div>";
    }
}
?>