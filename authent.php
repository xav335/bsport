<?php 

if ( !isset($_SERVER['PHP_AUTH_USER'])
		|| !isset($_SERVER['PHP_AUTH_PW'])
		|| ($_SERVER['PHP_AUTH_USER'] !== "xav" )
		|| ($_SERVER['PHP_AUTH_PW'] !== "xav") )
{
	header('WWW-Authenticate: Basic realm="Authentifiez vous"');
	header('HTTP/1.0 401 Unauthorized');
	echo '<html><head>';
	echo '<title>Acces Refuse</title></head><body>';
	echo '<h1>Acces Refuse</h1>';
	echo '</body></html>';
	exit;
}

print_r($_SERVER);

?>
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
	
	<div class="large-12 medium-12 small-12 columns">
		<h1>Mentions légales</h1>
		<h2>B'SPORT</h2>
			<div style=";border-bottom : 4px ridge white;padding:0px 4px 4px 4px; " >
			</div>
			
	</div>
	
</div>
<!-- /Content -->

<!-- Footer -->
<?php include('inc/footer.php'); ?>
<!-- /Footer -->

<!-- Scripts -->
<?php include('inc/script.php'); ?>


</body>
</html>
