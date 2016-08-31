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
	<title>Bsport.fr | Salle de sport | Planning </title>
	<meta name="Description" content="Prennez connaissance et téléchargez le planning des cours actualisé">
	<meta name="Keywords" content="cours, planning, réservations, agenda">
<?php include('inc/meta.php'); ?>
	
</head>
<body class="<?php if (basename(__FILE__) != "index.php") {echo "page";} ?>">

<!-- Header -->
<?php include('inc/header.php'); ?>
<!-- /Header -->


<!-- Content -->
<div class="row content">
	<div class="large-12 medium-12 small-12 columns">
		<h1>Planning des cours B'SPORT</h1>
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
	$('.menu ul li:nth-child(5), .left-off-canvas-menu li:nth-child(5)').addClass('active');
</script>

</body>
</html>
