<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	<title>Aeki - Connexion</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

</head>

<body>
	<?php
		include_once('v_ptut_navbar.php');
	?>

	<!-- container -->
	<div class="container">
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Connexion</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connexion à votre compte</h3>
							<p class="text-center text-muted">Pas encore inscrit ? <a href="v_ptut_inscription.php">Incrivez-vous !</a></p>
							<hr>
							
							<form action="../controller/c_ptut_verif.php" method="POST">
								<div class="top-margin">
									<label>Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="email" required>
								</div>
								<div class="top-margin">
									<label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" name="password" required>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<b><a href="">Mot de passe oublié ?</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Connexion</button>
									</div>
								</div>
							</form>
							<?php
                        	if(isset($_GET['erreur'])) {
                            $err = $_GET['erreur'];
                            if($err == 1){
                                echo "<p> Utilisateur ou mot de passe incorrect</p>";
                            }
                        }
                    ?>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	<?php
		include_once('v_ptut_footer.php');
	?>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="../assets/js/headroom.min.js"></script>
	<script src="../assets/js/jQuery.headroom.min.js"></script>
	<script src="../assets/js/template.js"></script>
</body>
</html>