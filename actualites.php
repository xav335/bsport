<?php 
require 'admin/classes/News.php';
require 'admin/classes/utils.php';
session_start();
$news = new News();
if (!empty($_GET)){
	$result = $news->newsGet($_GET['id']);
} else {
	$result = $news->newsGet(null);
}	
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
	<title>Time-Sport.fr | Salle de sport | actualités</title>
	<meta name="Description" content="consultez les actualités du club et les évènements avenir">
	<meta name="Keywords" content="actualités, évènements, fêtes, soirées, réunions">
<?php include('inc/meta.php'); ?>
	
</head>
<body class="<?php if (basename(__FILE__) != "index.php") {echo "page";} ?>">

<!-- Header -->
<?php include('inc/header.php'); ?>
<!-- /Header -->

<!-- Content -->
<div class="row content">
	<div class="large-8 medium-8 small-12 columns">
		<h1>Actualités <span class="red">Time</span>Sport</h1>
		<h2>Club de forme</h2>
			 <div id="resultat">
			 	
        		<?php echo "<h4>Date : <b>". traitement_datetime_affiche($result[0]['date_news']) ."</b></h4><br>".
					"<h3>".  $result[0]['titre'] ."</h3><br>".
					 $result[0]['contenu'];?>
    		</div>
	</div>
	<div class="large-4 medium-4 small-12 columns">
		
		
		<div class="large-12 columns">
			<div class="encart bg-white">
				<span class="titre">Liste des Actualités</span><br/>
				<span class="titre2">du club</span>
			</div>
			<div style=";border-bottom : 4px ridge white;padding:0px 4px 4px 4px; " class="<?php if ($i%2!=0) echo 'info'?>">
			</div>
			<?php 
				if (!empty($result)) {
					$i=0;
					foreach ($result as $value) { 
					$i++;
					?>
					<div style=";border-bottom : 4px ridge white;padding:24px 4px 24px 4px; <?php if ($i%2==0) echo 'background: #FFF;'?>">
						Actu publiée le: <b><?php echo traitement_datetime_affiche($value['date_news'])?></b><br>
						<h3><?php echo $value['titre']?></h3><br>
						<h4><?php echo $value['accroche']?></h4><br>
						<span class="suite2" id="submit" onclick="newsDisplay(<?php echo $value['id_news']?>)">&nbsp;<-- Afficher&nbsp;</span>
					</div>
					<?php } ?>
				<?php } ?>	
		</div>
	</div>
</div>
<!-- /Content -->

<!-- Footer -->
<?php include('inc/footer.php'); ?>
<!-- /Footer -->

<script type="text/javascript">
	
    function newsDisplay(id){
        
        $.get(
            '/ajax/actu.php?id='+id, 
            {
            },
            function(data){ 
				$("#resultat").html(data);
            },
            'text'
         );
    };

</script>

<!-- Scripts -->
<?php include('inc/script.php'); ?>
<script>
	$('.menu ul li:nth-child(5), .left-off-canvas-menu li:nth-child(5)').addClass('active');
</script>

</body>
</html>
