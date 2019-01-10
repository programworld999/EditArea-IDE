<?php
error_reporting(0);

//======= File Open =========//

if(isset($_POST['fopen'])){
$fileName=$_POST['fileName'];
$folderUrl=$_POST['folderUrl'];
 $file="/sdcard/htdocs/".$folderUrl."/".$fileName;

$fileExterntion=explode('.',$fileName);
 $fileExterntion=end($fileExterntion);

$allowed_files=array('html', 'php', 'js', 'css', 'htaccess');
if(in_array($fileExterntion, $allowed_files)){

$file_content=file_get_contents($file);

echo $file_content;

}else{
echo "This Not a allowed file or \n This Is Not A file \n You Should Close This Tab";
}
}

?>

<?php
//========= File Save ========//

if(isset($_POST['fileSave'])){

$fileName=$_POST['fileName'];
$fileContent=$_POST['fileContent'];	
$folderUrl=$_POST['folderUrl'];

$fileUrl=$_POST['folderUrl'];
 $fileUrl="/sdcard/htdocs/".$folderUrl."/".$fileName;

//echo $fileName ."". $fileContent ."\n". $fileUrl;


$file=fopen($fileUrl, 'w');
if(fwrite($file, $fileContent)){
echo "Saved: ". $fileUrl;
fclose($file);
}else{
echo "Filed!: Sorry";
}


}

?>

<?php
//======== Create New ========//


if(isset($_GET['createNew'])){

 $newFolderName= $_GET['newFolderName'];

$newFileName=$_GET['newFileName']."".$_GET['fileType'];

$pwd= $_GET["pwd"];

if(isset($newFolderName)){

if(mkdir($pwd."/".$newFolderName, 0777)){
//echo $pwd."</br>";

$folderBack=substr($pwd, 15);

$back= "http://localhost:8080/myEditor/index.php?folderN=".$folderBack;

echo "<input type='text' style='display: none' value='$back' id='backurl'>";

?>
<script>
var url=document.getElementById('backurl').value;
//alert(url);	
window.location=url;
</script>
<?php

//echo "folder Create Successful";
}else{

//echo "folder Create Unsuccessful . Sorry!";
}
//echo "The folder";

}else{
if(fopen($pwd."/".$newFileName, 'w')){

$folderBack=substr($pwd, 15);

$back= "http://localhost:8080/myEditor/index.php?folderN=".$folderBack;

echo "<input type='text' style='display: none' value='$back' id='backurl'>";

?>

<script>
var url=document.getElementById('backurl').value;
//alert(url);	
window.location=url;
</script>

<?php

//file create success;
}else{
echo "Unable to create file";
}
}

}


?>