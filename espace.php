<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>B.SPORT Club de forme | Espace</title>
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
		<h1>Espace B'SPORT</h1>
		<h2>Club de forme</h2>
		<p>
	
		</p>
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
	$('.menu ul li:nth-child(2), .left-off-canvas-menu li:nth-child(2)').addClass('active');
</script>

</body>
</html>
