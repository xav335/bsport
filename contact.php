<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>Bsport.fr | Salle de sport | Contact / Plan / Facebook </title>
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
		<h1>Contactez <span class="red">Sport</span>&nbsp;One</h1>
		<h2>Le Bouscat</h2>
		<p>
			32 rue des marronniers 33110 LE BOUSCAT (sur boulevard Godard)<br/>
			Tél. 05 56 69 91 23
		</p>
		<div id="resultat">
		
    	</div>
		<form data-abide id="formulaire">
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
					<input type="checkbox" id="newsletter" name="newsletter"  checked/> J'accepte de recevoir la newsletter de B'Sport.
				</div>
			</div>
			<button type="submit">Envoyer la demande</button>
		</form>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2828.0334900768985!2d-0.58771!3d44.861613000000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5528116548cf0d%3A0x103b756ab7c3535d!2sB&#39;SPORT!5e0!3m2!1sfr!2sfr!4v1416662515707" width="100%" height="300" frameborder="0" style="border:0"></iframe>
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
