<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>B.SPORT Club de forme | Contact</title>
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
	<div class="large-8 medium-8 small-12 columns">
		<h1>Contactez B'SPORT</h1>
		<h2>Le Bouscat</h2>
		<p>
			28-32 rue des marronniers 33110 LE BOUSCAT (sur boulevard Godard)<br/>
			Tél. 05 56 69 91 23
		</p>
		<form data-abide>
			<div class="row">
				<div class="large-6 columns">
					<label>Nom
						<input type="text" placeholder="Nom" required pattern="[a-zA-Z]+" />
					</label>
					<small class="error">Votre nom est obligatoire</small>
				</div>
				<div class="large-6 columns">
					<label>Prénom
						<input type="text" placeholder="Prénom" />
					</label>
				</div>
			</div>
			<div class="row">
				<div class="large-6 columns">
					<label>Téléphone
						<input type="text" placeholder="Téléphone" required />
					</label>
					<small class="error">Votre téléphone est obligatoire</small>
				</div>
				<div class="large-6 columns">
					<label>e-mail
						<input type="text" placeholder="e-mail" required />
					</label>
					<small class="error">Votre e-mail est obligatoire</small>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<label>Sujet
						<select required>
							<option value="renseignement">Renseignement</option>
							<option value="abonnement">Abonnement</option>
							<option value="programme">Programme des cours</option>
							<option value="autre">Autre</option>
						</select>
					</label>
					<small class="error">Merci de choisir un sujet</small>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<label>Message
						<textarea placeholder="Votre message" required></textarea>
					</label>
					<small class="error">Merci de saisir votre message</small>
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
