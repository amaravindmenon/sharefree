<?php
include "includes/header.php";
include "includes/navbar.php";

if(isset($_POST['bid']))
{
    $id=$_POST['pid'];
    $id=mysqli_real_escape_string($link,$id);
    $id=htmlentities($id);

    $sql="select * from posts where id =$id";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $row=mysqli_fetch_assoc($res);
    ?>

<div class="main">
<form action="edit_check.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
<div class="card-panel">


<h5>TITLE FOR POST</h5>
<textarea name="title" class="materialize-textarea" placeholder="title for post">
<?php 
echo $row['title'];
?>

</textarea>
<h5>POST CONTENT</h5>
<textarea name="ckeditor" id="ckeditor" class="ckeditor">
<?php 
echo $row['content'];
?>
</textarea>
</div>
<div class="center">
    <input type="submit" value="Update" name="update" class="btn white-text">
</div>
</form>
</div>
<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

<?php
include "includes/footer.php";
?>
    <?php    
    }
    else
    {
        redirect("Location: dashboard.php");
    }
    redirect("Location: dashboard.php");
}



if(isset($_POST['deleteid']))
{
    $id=$_POST['delid'];
    $id=mysqli_real_escape_string($link,$id);
    $id=htmlentities($id);

    $sqldel = "select feature_image from posts where id = $id";
    $sqlres = mysqli_query($link,$sqldel);
    if($rowdel = mysqli_fetch_assoc($sqlres))
    {   
        $imgdel  = $rowdel['feature_image'];
        unlink("../img/$imgdel");
    }
    else
    {
        echo "error";
    }

    $sql="delete from posts where id =$id";
    $res=mysqli_query($link,$sql);
    if($res)
    {
        $_SESSION['message']="<div class='chip green white-text'>Deleted Successfully</div>";
        header("Location: dashboard.php");
    }
    else
    {
        $_SESSION['message']="<div class='chip red black-text'>something went wrong</div>";
    }
}
?>


