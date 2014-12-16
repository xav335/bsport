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
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/img/logo.png" width="140"/></a>
                </div>
                <div class="collapse navbar-collapse">
           			<ul class="nav navbar-nav">
           				<li class="dropdown">
				          	<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Actualités <span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="/users/register">Ajout</a></li>
				            	<li><a href="#">Modification</a></li>
				            	<li><a href="#">Suppression</a></li>
				            	<li class="divider"></li>
				          	</ul>
				        </li>
                        <li class="dropdown">
				          	<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Livre d'or <span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="/users/register">Ajout</a></li>
				            	<li><a href="#">Modification</a></li>
				            	<li><a href="#">Suppression</a></li>
				            	<li class="divider"></li>
				          	</ul>
				        </li>
                        <li class="dropdown">
				          	<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Newsletter<span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="/users/register">Ajout</a></li>
				            	<li><a href="#">Modification</a></li>
				            	<li><a href="#">Suppression</a></li>
				            	<li class="divider"></li>
				            	<li><a href="#">Promotions</a></li>
				            	<li class="divider"></li>
				            	<li><a href="#">Offres spéciales</a></li>
				          	</ul>
				        </li>
                    </ul>
                     <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;Back Office / Administration</a>
                </div><!--/.nav-collapse -->
               
            </div>
        </nav>
  <div class="container">       
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Actu à la une</h3>
			</div>
			<div class="panel-body">
				<p>
					The community is working on developing a community site to serve as
					a repository and gallery for ZF2 modules. The project is available
					<a
						href="https://github.com/zendframework/modules.zendframework.com">on
						GitHub</a>. The site is currently live and currently contains a
					list of some of the modules already available for ZF2.
				</p>
				<p>
					<a class="btn btn-success" href="http://modules.zendframework.com/" target="_blank">Modifier /supprimer</a>
				</p>
			</div>
		</div>
	</div>

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

