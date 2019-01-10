<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
<div class="modal-dialog" role="document"> 
<div class="modal-content">
 <div class="modal-header"> 
<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
</div>
 <div class="modal-body"> 
<form action="server.php" method="get">

<input type="text" name="pwd" style="display:none;" value="<?php echo"/sdcard/htdocs/". $_GET['folderN']; ?>">

<select class="custom-select" onchange="selectCreateType(this.value)" >
<option>Folder</option>
<option>File</option>

</select>
</br>
<div class="file-or-folder">
<input type="text" name="newFolderName" class="form-control col-sm-12" placeholder="Folder Name" required>
</div>


</div> 
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
 <input type="submit" class="btn btn-primary" name="createNew" value="Create"> 
</form>
</div>
 </div> 
</div>
 </div>