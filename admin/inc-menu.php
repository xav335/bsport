	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/admin/"><img src="/img/logo.png" width="140"/></a>
                </div>
                <div class="collapse navbar-collapse">
           			<ul class="nav navbar-nav">
           				<li class="dropdown">
				          	<a href="?" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Actualités <span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="actu-ajout.php">Ajout</a></li>
				            	<li><a href="actu-liste.php">Modification</a></li>
				            	<li><a href="actu-liste.php">Suppression</a></li>
				          	</ul>
				        </li>
                        <li class="dropdown">
				          	<a href="?" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Livre d'or <span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="livredor-ajout.php">Ajout</a></li>
				            	<li><a href="livredor-liste.php">Modification</a></li>
				            	<li><a href="livredor-liste.php">Suppression</a></li>
				          	</ul>
				        </li>
                        <li class="dropdown">
				          	<a href="?" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Newsletter<span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="newsletter-modif.php">Newsletter Html</a></li>
				            	<li><a href="newsletter-texte_modif.php">Newsletter texte</a></li>
				            	<li class="divider"></li>
				            	<li><a href="#">Envoi</a></li>
				          	</ul>
				        </li>
                    </ul>
                     <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;Back Office</a>
                      <a class="btn btn-success pull-right" href="/admin/?action=getout">Déconnexion</a>
                </div><!--/.nav-collapse -->
               
            </div>
        </nav>
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
