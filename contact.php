<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>Sport-One.fr| Salle de sport | Contact / Plan / Facebook </title>
	<meta name="Description" content="Contactez nous à l'aide du formulaire de contact à votre disposition">
	<meta name="Keywords" content="contact, plan, facebook, adresse, téléphone, coordonnées, like">
<?php include('inc/meta.php'); ?>
	
</head>
<body class="<?php if (basename(__FILE__) != "index.php") {echo "page";} ?>">

<!-- Header -->
<?php include('inc/header.php'); ?>
<!-- /Header -->

<!-- Content -->
<div class="row content">
	<div class="large-8 medium-8 small-12 columns">
	<?php if ($_GET["essai"]=='1') { ?>
	 	<h1>Demande d'un <span class="red">essai gratuit</span>&nbsp;</h1>
	 	<p>
	 	 Veuillez renseigner vos coordonnées et indiquez dans votre message la disciple que vous souhaitez tester. 
	 	</p>
	 <?php } else { ?>
	    <h1>Contactez <span class="red">Sport</span>&nbsp;One</h1>
	    <h2>Le Bouscat</h2>
		<p>
			32 rue des marronniers 33110 LE BOUSCAT (sur boulevard Godard)<br/>
			Tél. 05 56 69 91 23
		</p>
	 <?php  } ?>
	
		
		
		
		<div id="resultat">
		
    	</div>
		<form data-abide id="formulaire">
		
		 <?php if ($_GET["essai"]=='1') { ?>
		  <input type="hidden" id="essai" name="essai" value="1">
		 <?php } else { ?>
		   <input type="hidden" id="essai" name="essai" value="0"> 
		 <?php  } ?>
			<div class="row">
				<div class="large-6 columns">
					<label>Nom
						<input type="text" id="nom" name="name" placeholder="Nom" required pattern="[a-zA-Z]+" />
					</label>
					<small class="error">Votre nom est obligatoire</small>
				</div>
				<div class="large-6 columns">
					<label>Prénom
						<input id="prenom" type="text" name="firstname" placeholder="Prénom" />
					</label>
				</div>
			</div>
			<div class="row">
				<div class="large-6 columns">
					<label>Téléphone
						<input type="text" id="tel" name="tel" required placeholder="Téléphone" />
					</label>
					<small class="error">Votre téléphone est obligatoire</small>
				</div>
				<div class="large-6 columns">
					<label>e-mail
						<input type="text" id="email" name="email" placeholder="e-mail" required />
					</label>
					<small class="error">Votre e-mail est obligatoire</small>
				</div>
			</div>
			<!-- 
			<div class="row">
				<div class="large-12 columns">
					<label>Sujet
						<select required id="sujet" name="sujet" >
							<option value="renseignement">Renseignement</option>
							<option value="abonnement">Abonnement</option>
							<option value="programme">Programme des cours</option>
							<option value="autre">Autre</option>
						</select>
					</label>
					<small class="error">Merci de choisir un sujet</small>
				</div>
			</div>
			 -->
			<div class="row">
				<div class="large-12 columns">
					<label>Message
						<textarea id="message" name="message" placeholder="Votre message" required></textarea>
					</label>
					<small class="error">Merci de saisir votre message</small>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<input type="checkbox" id="newsletter" name="newsletter"  checked/> J'accepte de recevoir la newsletter de Sport One.
				</div>
			</div>
			<button type="submit">Envoyer la demande</button>
		</form>
	
		  <a target="_blank" href="https://www.google.fr/maps/place/B'SPORT/@44.8615904,-0.5899175,17z/data=!3m1!4b1!4m5!3m4!1s0xd5528116548cf0d:0x103b756ab7c3535d!8m2!3d44.8615904!4d-0.5877235"><img src="img/plan.jpg" alt="" /></a>
	</div>
	<div class="large-4 medium-4 small-12 columns">
		<div class="large-12 columns">
			<img src="img/facebooklogo.png" alt="" />
				<p>
					Toutes les nouvelles du club, les évenements et les infos de dernières minutes.
					<div class="fb-like" data-href="https://www.facebook.com/pages/Bsport/184340404943880" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
				</p>
				<a class="suite" target="_blank" href="https://www.facebook.com/pages/Bsport/184340404943880"><img src="img/facebooksmall.png" alt="" />  Visitez notre page Facebook</a>
			<br><br><br>
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
		        url: '/ajax/contact.php',
		        type: 'post',
		        data: data,
		        success: function (data) {
		            $("#resultat").html("<h3>Merci pour votre message - Nous allons y donner suite très vite</h3>");
		        	$("#nom").val("");
		        	$("#prenom").val("");
		        	$("#email").val("");
		        	$("#tel").val("");
		           	$("#message").val("");
		           	$("#essai").val("");
		        },
		        error: function() {
		        	 $("#resultat").html("<h3>Une erreur s'est produite !</h3>");
		        }
		   	});
	return false;
	})

</script>


<!-- Footer -->
<?php include('inc/footer.php'); ?>
<!-- /Footer -->

<!-- Scripts -->
<?php include('inc/script.php'); ?>
<script>
	$('.menu ul li:last-child, .left-off-canvas-menu li:last-child').addClass('active');
</script>

</body>
</html>
