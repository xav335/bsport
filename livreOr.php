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
	<div class="large-8 medium-8 small-12 columns">
		<h1>Le Livre d'or B'SPORT</h1>
		<h2>Retrouvez les témoignages de nos adhérents</h2>
		<p>
			Vous trouverez dans cette rubrique les témoignages de nos adhérents et nous vous encourageons à nous laissez les votres et à signer notre livre d'or.
		</p>
	
		<a href="" class="suite">Lire la suite</a>
	</div>
	<div class="large-4 medium-4 small-12 columns">
		<div class="large-12 columns">
			<img src="img/img-velo.jpg" alt="" />
			<div class="encart bg-white">
				<span class="titre">Espace</span><br/>
				<span class="titre2">Musculation</span>
			</div>
		</div>
		<div class="large-12 columns">
			<div class="slider-mills">
				<div><img src="img/img-mills.jpg" alt="" /></div>
				<div><img src="img/img-mills.jpg" alt="" /></div>
				<div><img src="img/img-mills.jpg" alt="" /></div>
			</div>
			<div class="encart bg-orange">
				<span class="titre">les mills</span><br/>
				<span class="titre2">Body combat</span>
			</div>
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
	$('.menu ul li:nth-child(6), .left-off-canvas-menu li:nth-child(6)').addClass('active');
</script>

</body>
</html>
