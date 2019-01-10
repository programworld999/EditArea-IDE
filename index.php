<?php
error_reporting(0);
?>

<html>
 <head> 
 <title>My Editor</title>


<link rel="stylesheet" href="/bootstrap.css">
<link rel="stylesheet" href="style.css">

      </head> 
      <body>

</br> 

<div class="main-container main-div">

<div class="form-inline menu-bar">
<form id="folder-open" action="" method="get">
<input class=" form-control" placeholder="enter folder name from /sdcard/htdocs/" id="folder" name="folderN" value="<?php echo $_GET['folderN'] ?>/">
</form>
<div class="all-files">

<?php
if(isset($_GET['folderN'])){
$folder= $_GET['folderN'];
$files=scandir("/sdcard/htdocs/".$folder);
?>

<div class="single-file text-center" id="create" data-toggle="modal" data-target="#exampleModal">+
</div>

<div class="single-file" onclick="openthe('<?php echo $files[$i]; ?>')">
<?php echo $files[1]; ?>
</div>

<?php

$i=2;
while($i<count($files)){
?>
<div class="single-file" onclick="openthe('<?php echo $files[$i]; ?>')">
<?php echo $files[$i]; ?>
</div>

<?php
$i++;
}
}else{

echo "<div class='single-file'>Select Your folder</div>";
}
?>

</div>

<!--==== end of all-files ===-->

</div>
<!--==== end of menu-bar ===-->


       <div class="text-edito">
       	<textarea id="textarea" name="content" cols="80" rows="15"></textarea>
</div>
<!--==== end of text-editor ==-->

<div class="form-inline open-external-file-div">
<input type="text" class="form-control openexternalfile" placeholder="open external file by url" ><button type="button" class="btn btn-success  open-external-file-submit" onclick="openExternal()">Open</button>
</div>


</div>
<!-- end of main container-->

<div class="alert-message">

</div>

<!--== Display None Elements==-->
<?php 
echo "<input type='text' value='$folder' style='display: none' id='url-folder-name'>"?>

<!--===== Bootstrap Modal=====-->

<?php include('modal.php'); ?>



<!--==========Script========-->

<script src="/jquery.js"></script>
  <script language="javascript" type="text/javascript" src="http://localhost:8080/editarea/edit_area/edit_area_full.js"></script>
 <script src="/popper.min.js"></script> 
<script src="/bootstrap.min.js" ></script>
   <script src="script.js"></script>




       	 </body> 
       	 </html>