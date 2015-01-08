	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/admin/"><img src="/admin/img/logo.png" width="150"/></a>
                </div>
                <div class="collapse navbar-collapse">
           			<ul class="nav navbar-nav">
           				<li class="dropdown">
				          	<a href="news-list.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Actualités <span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="news-edit.php">Ajout</a></li>
				            	<li><a href="news-list.php">Modification</a></li>
				            	<li><a href="news-list.php">Suppression</a></li>
				          	</ul>
				        </li>
                        <li class="dropdown">
				          	<a href="goldbook-list.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Livre d'or <span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="goldbook-edit.php">Ajout</a></li>
				            	<li><a href="goldbook-list.php">Modification</a></li>
				            	<li><a href="goldbook-list.php">Suppression</a></li>
				          	</ul>
				        </li>
				        <li class="dropdown">
				          	<a href="contact-list.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contacts <span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="contact-edit.php">Ajout</a></li>
				            	<li><a href="contact-list.php">Modification</a></li>
				            	<li><a href="contact-list.php">Suppression</a></li>
				          	</ul>
				        </li>
                        <li class="dropdown">
				          	<a href="newsletter-list.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Newsletter<span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="newsletter-edit.php">Ajout Newsletter Html</a></li>
				            	<li><a href="newsletter-list.php">Liste Newsletter Html</a></li>
				            	<li class="divider"></li>
				            	<li><a href="newslettertxt-edit.php">Ajout Newsletter texte</a></li>
				            	<li><a href="newslettertxt-texte_modif.php">Newsletter texte</a></li>
				            	<li class="divider"></li>
				            	<li><a href="#">Envoi</a></li>
				            	<li><a href="#">Envoi Test</a></li>
				          	</ul>
				        </li>
				         <li class="dropdown">
				          	<a href="planning.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Planning <span class="caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><a href="planning.php">Modification</a></li>
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
