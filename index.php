<?php 
include "includes/header.php";
include "includes/navbar.php";
?>

<div class="row">
    <!--this is  main content area-->    
<div class="col 19 m9 s12">
<?php
$sql="select * from posts order by id DESC";
$res=mysqli_query($link,$sql);
if(mysqli_num_rows($res)>0)
{
        while($row=mysqli_fetch_assoc($res))
        {
?>
    <div class="col l3 m4 s6">
        <div class="card small">
                <div class="card-image">
    <img src="img/<?php echo $row['feature_image'];?>" alt="">
    <span class="card-title black-text truncate"><?php echo $row['title'] ?></span>
                </div>
    <div class="card-content">
                <?php echo $row['content']; ?>
    </div>
    <div class="card-action teal center">
            
            <a href="posts.php?id=<?php echo $row['id'];?>" class="white-text">Read More</a>
    </div>
        </div>
    </div>
<?php
        }
}
?>

</div>
    <!--This is sidebar area-->
    <div class="col l3 m3 s12">
    <?php
    include "includes/sidebar.php";
    ?>


<?php
include "includes/footer.php";
?>

