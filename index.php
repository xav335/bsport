<?php 
require 'admin/classes/News.php';
require 'admin/classes/utils.php';
session_start();
$news = new News();
$result = $news->newsGet(null);
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
	<title>Time-Sport.fr | Salle de sport et fitness Bordeaux - Le Bouscat</title>
	<meta name="Description" content="TimeSport est une salle de sport qui propose des cours de fitness, de remise en forme, des salles de musculation, des cours en piscine par aquagym, à Bordeaux Le Bouscat ">
	<meta name="Keywords" content="salle de sport, fitness, aquagym, aquabike, aquabiking, Aquacycling, Waterbike, Aquasport, piscine, musculation, remise en forme, altères, cours de gym, cours de fitness, cardio, lesmills, bordeaux">

	<?php include('inc/meta.php'); ?>
	<?php include('inc/slideshow2.php'); ?>
	
</head>
<body class="<?php if (basename(__FILE__) != "index.php") {echo "page";} ?>">

<!-- Header -->
<?php include('inc/header.php'); ?>
<!-- /Header -->

<!-- Content -->
<div class="row ">
	<div class="large-8 medium-8 small-12 columns">
		<h1><span class="red">Time</span>Sport</h1>
		<h2>Club de forme</h2>
		<p>
			Pour la plénitude du corps et de l’esprit, <span class="red">Time</span>Sport conçoit un programme de remise en forme qui vous ressemble : une approche sportive douce ou plus intense, ponctuée d’instants de détente essentiels à la sérénité.
		</p>
		
		<div class="large-6 medium-6 small-12 columns">	
			<div style="padding-left: 0px;">
				<a class="fancybox-media" href="https://www.youtube.com/watch?v=FQY8beNFrXc">
				<img src="img/video2.jpg" alt="" /></a>
			</div>	
		</div>
		<div class="large-6 medium-6 small-12 columns">	
			<a class="fancybox" href="img/cardio.jpg"><img src="img/cardio.jpg" alt="" /></a>
		</div>
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
<br>
<div class="row">
	<div class="large-12 medium-12 small-12 columns">
        <div  id="demo-1" data-zs-src='["img/bsport11.jpg", "img/bsport21.jpg", "img/bsport31.jpg", "img/bsport41.jpg", "img/bsport51.jpg", "img/bsport612.jpg"]' data-zs-overlay="false" data-zs-bullets="false" data-zs-speed="8000" data-zs-interval="5000" data-zs-switchSpeed="800">
		  <div class="demo-inner-content">
		  
		  </div>
	   </div>
    </div>
 </div>

<div class="row">
	<div class="large-4 medium-4 small-12 columns">
		&nbsp;
		<a href="espace.php" >
		<div class="slider-espace fade">
			<div><img src="img/espace44.jpg" alt="" /></div>
			<div><img src="img/espace21.jpg" alt="" /></div>
			<div><img src="img/espace22.jpg" alt="" /></div>
			<div><img src="img/espace33.jpg" alt="" /></div>
		</div>
		<div class="encart bg-white">
			<span class="titre">Espace</span><br/>
			<span class="titre2">Visitez notre club</span>
		</div>
		</a>
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
	
	<div class="large-4 medium-4 small-12 columns">
		&nbsp;
		<a href="planning.php" >
		
		<img src="img/imgplanning.jpg" alt="" />
		<div class="encart bg-white">
			<span class="titre">Planning</span><br/>
			<span class="titre2">des cours</span>
		</div>
		</a>
	</div>

</div>
</br>
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
