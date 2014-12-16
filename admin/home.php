<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Back Office / Administration</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Le styles -->
<link href="/admin/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
<link href="/admin/css/bootstrap-theme.min.css" media="screen" rel="stylesheet" type="text/css">
<link href="/admin/css/style.css" media="screen" rel="stylesheet" type="text/css">
<link href="/img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
<!-- Scripts -->
<script type="text/javascript" src="/admin/js/custom.js"></script>
<!--[if lt IE 9]><script type="text/javascript" src="/admin/js/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script type="text/javascript" src="/admin/js/respond.min.js"></script><![endif]-->
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/admin/js/bootstrap.min.js"></script>

</head>
<body>	
	<?php require_once 'inc-menu.php';?>
  	

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Message du livre d'or à valider</h3>
			</div>
			<div class="panel-body">
				<p>
					If you need any help or support while developing with ZF2, you may
					reach us via IRC: <a href="irc://irc.freenode.net/zftalk">#zftalk
						on Freenode</a>. We'd love to hear any questions or feedback you
					may have regarding the beta releases. Alternatively, you may
					subscribe and post questions to the <a
						href="http://framework.zend.com/wiki/display/ZFDEV/Mailing+Lists">mailing
						lists</a>.
				</p>
				<p>
					<a class="btn btn-success pull-right" href="http://webchat.freenode.net?channels=zftalk" target="_blank">Modifier</a>
				</p>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function () {
	var url = window.location;
	// Will only work if string in href matches with location
	$('ul.nav a[href="'+ url +'"]').parent().addClass('active');

	// Will also work for relative and absolute hrefs
	$('ul.nav a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');
	});
</script>

