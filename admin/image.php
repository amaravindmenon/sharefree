<?php
SESSION_START();
include "includes/navbar.php";
$username=$_SESSION['username'];
$dir="../img/";
$files=scandir($dir);
if($files)
{
    ?>
    <div class="main">
    <div class="row">
    
    <?php
        // foreach($files as $files)
        // {
        //     if(strlen($files)>2)
        //     {
        // 
    $query = "select feature_image from posts where username = '$username'";
    $res = mysqli_query($link,$query);
    while($row = mysqli_fetch_array($res))
    {       
    ?>
    <div class="col l2 m3 s6">
    <div class="card">
    <div class="card-image">
    <img src="../img/<?php echo $row['feature_image'];?>" alt="" style="height:100px;width:150px">
    </div>
    </div>
    </div>
    <?php
    }
}
?>
