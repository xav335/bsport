<?php include_once 'inc-auth-granted.php';?>
<?php include_once 'classes/utils.php';?>
<?php 
require 'classes/StorageManager.php';

	$storageManager = new StorageManager();
	$accessGranted = $storageManager->getNews($_GET['id']);
	//print_r($accessGranted);
	if (empty($accessGranted)) {
		$message = 'Aucun enregistrements';
	} else {
		$message = '';
	}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<?php include_once 'inc-meta.php';?>
</head>
<body>	
	<?php require_once 'inc-menu.php';?>

	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<h3>Actu n°: </h3>
					<form>
			            <textarea name="editor1" id="editor1" rows="10" cols="80">
			               
			            </textarea>
						<script type="text/javascript">
						 
						tinymce.init({
						selector: "textarea",
						// ===========================================
						// INCLUDE THE PLUGIN
						// ===========================================
						plugins: [
						"advlist autolink lists link image charmap print preview anchor",
						"searchreplace visualblocks code fullscreen",
						"insertdatetime media table contextmenu paste jbimages"
						],
						// ===========================================
						// PUT PLUGIN'S BUTTON on the toolbar
						// ===========================================
						toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
						// ===========================================
						// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
						// ===========================================
						relative_urls: false,
						file_browser_callback: RoxyFileBrowser
							
						});


						function RoxyFileBrowser(field_name, url, type, win) {
							  var roxyFileman = '/admin/fileman/index.html';
							  if (roxyFileman.indexOf("?") < 0) {     
							    roxyFileman += "?type=" + type;   
							  }
							  else {
							    roxyFileman += "&type=" + type;
							  }
							  roxyFileman += '&input=' + field_name + '&value=' + document.getElementById(field_name).value;
							  if(tinyMCE.activeEditor.settings.language){
							    roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
							  }
							  tinyMCE.activeEditor.windowManager.open({
							     file: roxyFileman,
							     title: 'Roxy Fileman',
							     width: 850, 
							     height: 650,
							     resizable: "yes",
							     plugins: "media",
							     inline: "yes",
							     close_previous: "no"  
							  }, {     window: win,     input: field_name    });
							  return false; 
							}
							</script>
						
						 
						</script>
			        </form>
			</div>
		</div>
	</div>
</body>
</html>


