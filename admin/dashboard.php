<?php
//include "includes/header.php";
include "includes/navbar.php";
if(isset($_SESSION['username']))
{ 
?>

<!--main content started-->
<div class="main">
<div class="row">
<div class="col l6 m6 s12">
<ul class="collection with-header">
<li class="collection-header teal">
<h4 class="white-text">Recent Posts</h4>

<?php
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<span id="message"></span>
</li>
<?php
$username=$_SESSION['username'];
$sql="select * from posts where username = '$username' order by id desc";
$res=mysqli_query($link,$sql);
if(mysqli_num_rows($res)>0)
{
while($row=mysqli_fetch_assoc($res))
{
?>
<li class="collection-item">
 <a href=""><?php echo $row['title']; ?></a>   
<br>
<span>
    <style>
    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  text-align: center;
  display: inline-block;
  height: 30px;
  width: 70px;
}
    .button4 {border-radius: 12px;}
    </style>
    <form action="edit.php" method="POST">
    <input type="hidden" name="pid" value="<?php echo $row['id'];?>"><button class = "button button4" type="submit" name="bid">Edit</button> |
    <input type="hidden" name="delid" value="<?php echo $row['id'];?>"><button class = "button button4" type="submit" name="deleteid">Delete</button> |
    <a href=""><i class="material-icons tiny green-text">share</i>Share</a>
</span>
</li>
</form>
<?php
}
}
else
{
  echo "<div class='chip red white-text'>No New posts, Write one by clicking Down Below Circle</div>";
}
?>
</ul>


</div>
<div class="col l6 m6 s12">
<ul class="collection with-header">
<li class="collection-header teal">
<h4 class="white-text">Recent Comments</h4>
<span id="message1">
</span>
</li>
<?php
$user12 = $_SESSION['username'];
$sql4="select * from comment where username = '$user12' and status = 0 order by id DESC";
$res4=mysqli_query($link,$sql4);
if(mysqli_num_rows($res4)>0)
{
  while($row=mysqli_fetch_assoc($res4))
  {
?>
<li class="collection-item">
<?php echo $row['comment_text']; ?>
<span class="secondary-content">
<?php echo $row['email']; ?>
</span>
<br>
<span>
    <a href="" class="approve" id="<?php echo $row['id'];?>"><i class="material-icons tiny green-text">done</i>Approve</a> |
    <a href=""><i class="material-icons tiny red-text">clear</i>Remove</a> 
</span>

</li>
<?php

  }
}
?>
</li>
</ul>


</div>

</div>
</div>
</div>

<div class="fixed-action-btn">
<a href="write.php" class="btn-floating btn btn-large white-text pulse"><i class="material-icons">edit</i></a>
</div>
<script>
const approv=document.querySelectorAll(".approve");
approv.forEach(function(item,index)
{
item.addEventListener("click",approveNow)
})

function approveNow(e)
{
  e.preventDefault();
  if(confirm("Do you really Want to Approve"))
  {
const xhr=new XMLHttpRequest();
xhr.open("GET","approve.php?id="+Number(e.target.id),true)
xhr.onload=function()
{
  const messg=xhr.responseText;
  const message=document.getElementById("message1")
  message.innerHTML=messg;
}
xhr.send()
  }

}
</script>
<script>
const del=document.querySelectorAll(".delete");
del.forEach(function(item,index)
{
item.addEventListener("click",deleteNow)
})

function deleteNow(e)
{
  e.preventDefault();
  if(confirm("Do you really Want to Delete"))
  {
const xhr=new XMLHttpRequest();
xhr.open("GET","delete.php?id="+Number(e.target.id),true)
xhr.onload=function()
{
  const messg=xhr.responseText;
  const message=document.getElementById("message")
  message.innerHTML=messg;
}
xhr.send()
  }

}
</script>

<?php
include "includes/footer.php";

}
else
{
    $_SESSION['message']="<div class='chip red black-text'> Login to continue</div>";
    header("Location: login.php");
}
?>



