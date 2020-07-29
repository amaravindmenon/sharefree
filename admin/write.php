<?php
include "includes/header.php";
include "includes/navbar.php";
include "includes/dbh.php";
if(isset($_SESSION['username']))
{
?>
<div class="main">
<form action="write_check.php" method="POST" enctype="multipart/form-data">
<div class="card-panel">

<?php
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>


<h5>TITLE FOR POST</h5>
<textarea name="title" class="materialize-textarea" placeholder="title for post"></textarea>
<h5>Featured Image</h5>
<div class="input-field file-field">
<div class="btn">
Upload File
<input type="file" name="image">
</div>
<div class="file-path-wrapper">
<input type="text" class="file-path">
</div>
</div>
<h5>POST CONTENT</h5>
<textarea name="ckeditor" id="ckeditor" class="ckeditor"></textarea>
</div>
<div class="center">
    <input type="submit" value="publish" name="publish" class="btn white-text">
</div>
</form>
</div>
<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

<?php
include "includes/footer.php";
}
else
{
    $_SESSION['message']="<div class='chip red black-text'> Login to continue</div>";
    header("Location: login.php");
}
?>


