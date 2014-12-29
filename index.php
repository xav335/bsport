<?php 
require 'admin/classes/StorageManager.php';
require 'admin/classes/utils.php';
session_start();
$storageManager = new StorageManager();
$result = $storageManager->newsGet(null);
//print_r($result);
if (empty($result)) {
	$titre=  		'';
	$date_news= 	'';
	$accroche= 		'Pas de news pour le moment.';
	$contenu= 		'';
} else {
	$titre=  		$result[0]['titre'];
	$date_news= 	traitement_datetime_affiche($result[0]['date_news']);
	$accroche= 		$result[0]['accroche'];
	$contenu= 		$result[0]['contenu'];
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>B.SPORT Club de forme</title>
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
		<h1>B'SPORT</h1>
		<h2>Club de forme</h2>
		<p>
			Pour la plénitude du corps et de l’esprit, B'Sport conçoit un programme de remise en forme qui vous ressemble : une approche sportive douce ou plus intense, ponctuée d’instants de détente essentiels à la sérénité.
		</p>
		
		<div class="large-8 medium-8 small-12 columns">	
			<div><a class="fancybox-media suite" href="https://www.youtube.com/watch?v=FQY8beNFrXc"><img src="img/youtube.png" alt="" /> Notre video de présentation</a></div>
		</div>
	</div>
	<div class="large-4 medium-4 small-12 columns">
		&nbsp;
		<a href="les-cours.php" >
		<div class="slider-espace autoplay2">
			<div><img src="img/bodybalancemain.jpg" alt="" /></div>
			<div><img src="img/bodycombatmain.jpg" alt="" /></div>
			<div><img src="img/bodypumpmain.jpg" alt="" /></div>
			<div><img src="img/rpmmain.jpg" alt="" /></div>
		</div>
		<div class="encart bg-orange">
			<span class="titre">Tous nos cours</span><br/>
			<span class="titre2">LES MILLS</span>
		</div>
		</a>
	</div>		
	
</div>
<div class="row">
	<div class="large-4 medium-4 small-12 columns">
		&nbsp;
		<a href="espace.php" >
		<div class="slider-espace fade">
			<div><img src="img/img-velo.jpg" alt="" /></div>
			<div><img src="img/espace1.jpg" alt="" /></div>
			<div><img src="img/espace2.jpg" alt="" /></div>
			<div><img src="img/espace3.jpg" alt="" /></div>
		</div>
		<div class="encart bg-white">
			<span class="titre">Espace</span><br/>
			<span class="titre2">Visitez notre club</span>
		</div>
		</a>
	</div>
		
	
	<div class="large-4 medium-4 small-12 columns">
		&nbsp;
		<a href="planning.php" >
		<div class="encart bg-white">
			<span class="titre">Planning</span><br/>
			<span class="titre2">des cours</span>
		</div>
		<img src="img/planning.jpg" alt="" />
		
		</a>
	</div>

	<div class="large-4 medium-4 small-12 columns">
		&nbsp;
		<h1>Actualités du Club</h1>
		<h2><?php echo $titre?></h2>
		<?php echo $date_news?> :
		<p>
			<?php echo $accroche?>
		</p>
		
		<div class="large-12 medium-12 small-12 columns">	
			<div><a class="suite" href="actualites.php">Voir la Suite</a></div>
		</div>
	</div>	
	
</div>
<div class="row content">
	
</div>
<!-- /Content -->

<!-- Footer -->
<?php include('inc/footer.php'); ?>
<!-- /Footer -->

<!-- Scripts -->
<?php include('inc/script.php'); ?>
<script>
	$('.menu ul li:first-child, .left-off-canvas-menu li:first-child').addClass('active');
</script>

</body>
</html>
