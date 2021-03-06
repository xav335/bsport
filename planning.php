<!doctype html>
<html class="no-js" lang="en">
<?php 
require 'admin/classes/Planning.php';
require 'admin/classes/utils.php';
session_start();
$planning = new Planning();
$result = $planning->planningGet();
$planning = null;

$titre= null;
$url= null;
$pdf= null;
if (!empty($result)) {
	$titre= $result[0]['titre'];
	$url= $result[0]['url'];
	$pdf= $result[0]['pdf'];
}
//print_r($result);
?>
<head>
	<title>Time-Sport.fr | Salle de sport | Planning </title>
	<meta name="Description" content="Prennez connaissance et téléchargez le planning des cours actualisé">
	<meta name="Keywords" content="cours, planning, réservations, agenda">
<?php include('inc/meta.php'); ?>
	
	<style type="text/css">
		* Magnifier *//* Magnifier *//* Magnifier *//* Magnifier *//* Magnifier */

		/*Some CSS*/
		* {margin: 0; padding: 0;}
		.magnify {width: 950px; margin: 50px auto; position: relative;}
		
		.large {
			width: 375px; height: 375px;
			position: absolute;
			border-radius: 100%;
			
			/*Multiple box shadows to achieve the glass effect*/
			box-shadow: 0 0 0 7px rgba(255, 255, 255, 0.85), 
			0 0 7px 7px rgba(0, 0, 0, 0.25), 
			inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
			
			/*Lets load up the large image first*/
			background: url('<?php echo $url?>') no-repeat;
			
			/*hide the glass by default*/
			display: none;
		}
		
		/*To solve overlap bug at the edges during magnification*/
		.small { display: block; }
		/* Magnifier *//* Magnifier *//* Magnifier *//* Magnifier *//* Magnifier */
				
			
	</style>
</head>
<body class="<?php if (basename(__FILE__) != "index.php") {echo "page";} ?>">

<!-- Header -->
<?php include('inc/header.php'); ?>
<!-- /Header -->


<!-- Content -->
<div class="row content">
	<div class="large-12 medium-12 small-12 columns">
		<h1>Planning des cours <span class="red">Time</span>Sport</h1>
		<h2><?php echo $titre?></h2>
		
	  
	<div class="magnify fullwidth">
		<!-- This is the magnifying glass which will contain the original/large version -->
		<div class="large"></div>
		<!-- This is the small image width="1624" height="726"  -->
		<img class="small" src="<?php echo $url?>" />
	</div>
		
	<div class="large-6 medium-6 small-12 columns">	
			<div><a class="suite" target="_blank" href="<?php echo $pdf?>"><img src="img/pdf-icon.png" alt="" /> Téléchargez le programne des cours</a></div>
	</div>
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
	$('.menu ul li:nth-child(7), .left-off-canvas-menu li:nth-child(7)').addClass('active');
</script>

</body>
</html>
