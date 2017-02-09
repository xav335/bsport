<!doctype html>
<?php 
require 'admin/classes/Goldbook.php';
require 'admin/classes/utils.php';
session_start();
$goldbook = new Goldbook();
$result = $goldbook->goldbookValidGet();
$goldbook = null;
//print_r($result);
?>
<html class="no-js" lang="en">
<head>
	<title>Time-Sport.fr | Salle de sport | livre d'or </title>
	<meta name="Description" content="Laissez vos impressions et vos commentaires sur notre livre d'or et prennez connaissance des avis des autres menbres du club">
	<meta name="Keywords" content="avis, commentaire, remarques, impressions">
<?php include('inc/meta.php'); ?>
	
</head>
<body class="<?php if (basename(__FILE__) != "index.php") {echo "page";} ?>">

<!-- Header -->
<?php include('inc/header.php'); ?>
<!-- /Header -->

<!-- Content -->
<div class="row content">
	<div class="large-5 medium-5 small-12 columns">
		<div class="encart bg-white">
			<span class="titre2">Signez le livre d'or</span><br/>
			<span class="titre">du club</span>
		</div>
		<div id="resultat">
		
    	</div>
    	<form data-abide id="formulaire">
    		<input type="hidden" name="datepicker" id="datepicker"  value="<?php echo date("d/m/Y")?>">
			<div class="row">
				<div class="large-12 columns">
					<label>Nom
						<input name="name" id="nom" type="text" placeholder="Nom" required pattern="[a-zA-Z]+" />
					</label>
					<small class="error">Votre nom est obligatoire</small>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<label>e-mail
						<input name="email" id="email" type="email" placeholder="e-mail" required />
					</label>
					<small class="error">Votre e-mail est obligatoire</small>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<label>Message
						<textarea name="message" id="message" placeholder="Votre message" required></textarea>
					</label>
					<small class="error">Merci de saisir votre message</small>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<input type="checkbox" id="newsletter" name="newsletter"  checked/> J'accepte de recevoir la newsletter de <span class="red">Time</span>Sport.
				</div>
			</div>
			<input class="suite" id="bouton" type="submit" value="Laissez nous votre témoignage"/>
		</form>
	</div>
	<div class="large-7 medium-7 small-12 columns">
		<h1>Le Livre d'or <span class="red">Time</span>Sport</h1>
		<h2>Retrouvez les témoignages de nos adhérents</h2>
			<div style=";border-bottom : 4px ridge white;padding:0px 4px 4px 4px; " class="<?php if ($i%2!=0) echo 'info'?>">
			</div>
			<?php 
			if (!empty($result)) {
				$i=0;
				foreach ($result as $value) { 
				$i++;
				?>
				<div style=";border-bottom : 4px ridge white;padding:24px 4px 24px 4px; <?php if ($i%2==0) echo 'background: #FFF;'?>" >
					Message publiée le: <b><?php echo traitement_datetime_affiche($value['date'])?></b><br>
					<h3><?php echo $value['nom']?></h3><br>
					<h4><?php echo nl2br($value['message'])?></h4><br>
				</div>
				<?php } ?>
			<?php } ?>	
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
<script>
	$('.menu ul li:nth-child(6), .left-off-canvas-menu li:nth-child(6)').addClass('active');
</script>

</body>
</html>
