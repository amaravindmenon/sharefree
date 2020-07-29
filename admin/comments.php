<?php
include "includes/navbar.php";
if(isset($_SESSION['username']))
{
?>

<div class="row main">
<div class="col s12 m12 l12">
<div class="card-panel">

<ul class="collection with-header">
<li class="collection-header teal">
<h4 class="white-text">Recent Comments</h4>
<span id="message1">
</span>
</li>
<?php
$user12 = $_SESSION['username'];
$sql4="select * from comment where username = '$user12' order by id DESC";
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
  $_SESSION['message']="<div class='chip red black-text'>Login To Continue</div>";
  header("Location: login.php");
}
?>