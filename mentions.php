<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>B.SPORT Club de forme | Le Club</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
<?php include('inc/meta.php'); ?>
	
</head>
<body class="<?php if (basename(__FILE__) != "index.php") {echo "page";} ?>">

<!-- Header -->
<?php include('inc/header.php'); ?>
<!-- /Header -->

<!-- Content -->
<div class="row content">
	
	<div class="large-12 medium-12 small-12 columns">
		<h1>Mentions légales</h1>
		<h2>B'SPORT</h2>
			<div style=";border-bottom : 4px ridge white;padding:0px 4px 4px 4px; " >
			</div>
			
	</div>
	
</div>
<!-- /Content -->
<script type="text/javascript">

	$(document).on('submit','#formulaire',function(e) {
	  e.preventDefault();
	  data = $(this).serializeArray();

	  data.push({
	   		name: 'action',
	    	value: 'sendMail'
	  	})

	  console.log(data);

	    /* I put the above code for check data before send to ajax*/
	    $.ajax({
		        url: '/ajax/goldbook.php',
		        type: 'post',
		        data: data,
		        success: function (data) {
		            $("#resultat").html("<h3>Merci pour votre message</h3>");
		        	$("#nom").val("");
		           	$("#email").val("");
		           	$("#message").val("");
		        },
		        error: function() {
		        	 $("#resultat").html("<h3>Une erreur s'est produite !</h3>");
		        }
		   	});
	return false;
	})

/*		

$( document ).ready(function() {
	
	$("#formulaire").submit(function(e) {

		e.preventDefault();
		
 		if($("form")[0].checkValidity()) {
		  	data = $(this).serializeArray();
		  	data.push({
		   		name: 'action',
		    	value: 'sendMail'
		  	})

		    $.ajax({
		        url: '/ajax/goldbook.php',
		        type: 'post',
		        data: data,
		        success: function (data) {
		            $("#resultat").html("<h3>Merci pour votre message</h3>");
		        	$("#nom").val("");
		           	$("#email").val("");
		           	$("#message").val("");
		        },
		        error: function() {
		        	 $("#resultat").html("<h3>Une erreur s'est produite !</h3>");
		        }
		   	});
	    //return false;	     
		}else{
			console.log("invalid form");
		}
	});
});
			*/	
</script> 
<!-- Footer -->
<?php include('inc/footer.php'); ?>
<!-- /Footer -->

<!-- Scripts -->
<?php include('inc/script.php'); ?>


</body>
</html>
