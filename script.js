
$('.alert-message').hide();
var folderUrl=$('#url-folder-name').val();

editAreaLoader.init({ 	
    id : "textarea"
    ,syntax: "html"	
    ,start_highlight: true	
    ,toolbar: "new_document, save,  |, search, go_to_line, fullscreen,|, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, |, help"
	,syntax_selection_allow: "css,html,js,php,python,vb,xml,c,cpp,sql,basic,pas,brainfuck"

	,save_callback: "my_save"
	,is_multi_files: true
 ,EA_load_callback: "editAreaLoaded"
		,end_toolbar: "| , "+folderUrl
		
    });

function my_save(id, content){


var file=editAreaLoader.getCurrentFile(id).title;
var folderUrl=$('#url-folder-name').val();


$.ajax({
url: 'server.php',
type: 'post',
data: {fileName: file, folderUrl: folderUrl, fileContent: content, fileSave: 'save'},
success: function(data){
alertMessage(data, 4000);
//alert(data);
},
error: function(xh){
alert("Error");
}

});

}
function editAreaLoaded(id){

openthe(file);
}
function openthe(file){

var fileExtension= file.split(".");
fileExtension=fileExtension[(fileExtension.length)-1];

var allowedExterntion=['css' ,'html' ,'js' ,'php' ,'python' ,'vb' ,'xml' ,'c' ,'cpp' ,'sql' ,'basic' ,'pas' ,'brainfuck' ,'htaccess' ,'txt'];

//allowedExterntion.indexOf(fileExtension)
if(allowedExterntion.indexOf(fileExtension) != -1){

var folderUrl=$('#url-folder-name').val();
//alert(folderUrl);

$.ajax({
url: 'server.php',
type: 'post',
data: {fileName:file,folderUrl:folderUrl, fopen: 'submit'},
success: function(data){

var new_file= {id: file, text: data, syntax: fileExtension, title: file };
			editAreaLoader.openFile('textarea', new_file);
}
//alert(data);

});


}else{

alert("This Not a allowed file or \n This Is Not A file \n We Can't Open This File");

}

}
//======== Folder Open ==========


function alertMessage(message, duration){
$('.alert-message').show();
$('.alert-message').html(message);

setTimeout(function(){
$('.alert-message').hide();
}, duration)


}

//======== CREATE ==========

function selectCreateType(value){

if(value == "File"){
$('.file-or-folder').html('<div class="form-inline"></br><input type="text" name="newFileName" class="form-control col-sm-8" placeholder="file Name" required><select class="custom-select col-sm-4"  name="fileType"><option>.html</option><option>.css</option><option>.php</option><option>.py</option><option>.js</option><option>.asp</option></select>');

}else{
$('.file-or-folder').html('<input type="text" name="newFolderName" class="form-control col-sm-12" placeholder="Folder Name" required>');

}

}

//==== open-external-file ====//

function openExternal(){
var file=$(".openexternalfile").val();
openthe(file);

}