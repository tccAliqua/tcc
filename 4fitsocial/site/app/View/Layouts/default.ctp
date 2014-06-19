<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('bootstrap-theme.css');
		echo $this->Html->css('fitness.css');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="js/jquery_min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
  });
  </script>
</head>
<body background="/4fitsocial/site/app/webroot/img/1024px-Gym_wiki.jpg">
	
		<div id="header">
			 <!-- Static navbar -->
		      <div class="navbar navbar-default" role="navigation">
		        <div class="container-fluid">
		          <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		              <span class="sr-only">Toggle navigation</span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="/4fitsocial/site">4FitSocial</a>
		          </div>
		          <div class="navbar-collapse collapse">
		            <ul class="nav navbar-nav">
		              <li><a href="/4fitsocial/site/dashboard">Home</a></li>
		              <li><a href="#">Acadêmias</a></li>
		              <li><a href="#">Professores</a></li>
		              <li><a href="#">Amigos</a></li>
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Treinos <b class="caret"></b></a>
		                <ul class="dropdown-menu">
		                  <li><a href="#">Meus treinos</a></li>
		                  <li><a href="#">Treinos do professor</a></li>
		                </ul>
		              </li>
		            </ul>
		            <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                	Opções
		                	<b class="caret"></b>
		                </a>
		                <ul class="dropdown-menu">
		                  <li><a href="#">Perfil</a></li>
		                  <li><a href="#">Notificações</a></li>
		                  <li class="divider"></li>
		                  <li><a href="/4fitsocial/site/users/logout">Sair</a></li>
		                </ul>
		              </li>
		            </ul>
		          </div><!--/.nav-collapse -->
		        </div><!--/.container-fluid -->
		      </div>
		</div>
		<div id="content" style="width:95%;margin:auto;">
			<div class="container-fluid">
				<div class="row">
					<div class="row">
						<div class="col-xs-2">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title">Olá <?php echo AuthComponent::user('nome'); ?>!</h3>
								</div>
								<div class="panel-body">
						        	<div>
										<div style="float: left; text-align: right;width:55%;">
											Acadêmias:
										</div>
										<div style="float: right; text-align: left; width:45%;">
											<span class="badge">42</span>
										</div>
										<div style="float: left; text-align: right;width:55%;">
											Professores:
										</div>
										<div style="float: right; text-align: left;width:45%;">
											<span class="badge">42</span>
										</div>
										<div style="float: left; text-align: right;width:55%;">
											Amigos:
										</div>
										<div style="float: right; text-align: left;width:45%;">
											<span class="badge">42</span>
										</div> 
									</div>
						    	</div>
							</div>
						</div>
						<div class="col-xs-10">
							<?php echo $this->Session->flash(); ?>
							<?php echo $this->fetch('content'); ?>
						</div>
					</div>
			    	
			    </div>
			</div>
		</div>
		<div id="footer">
			<p>&copy; Company 2014</p>
		</div>
	</div>
</body>
</html>
