<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Aeki - Inscription</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
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
					<h1 class="page-title">Inscription</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Création d'un nouveau compte</h3>
							<p class="text-center text-muted">Déjà inscrit chez nous ? <a href="v_ptut_connexion.php">Connectez-vous</a> à votre compte.</p>
							<hr>

							<form action="../controller/c_ptut_register.php"method="POST">
								<div class="top-margin">
									<label>Prénom</label>
									<input type="text" class="form-control" name ="prenom" required>
								</div>
								<div class="top-margin">
									<label>Nom</label>
									<input type="text" class="form-control" name="nom"required>
								</div>
								<div class="top-margin">
									<label>Adresse Mail <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="email" required>
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Mot de passe <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name ="password" required>
									</div>
									<div class="col-sm-6">
										<label>Confirmé le mot de passe <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="confirm_password" required>
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox"> 
											J'ai lu et approuvé <a href="page_terms.html">les Termes et Conditions d'utilisation</a>
										</label>                        
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">S'inscrire</button>
									</div>
								</div>
								<?php
									if(isset($_GET['valider'])){
										$val = $_GET['valider'];
										if($val == 1){
											echo "<p> Votre compte a été créé avec succès </p>";
										}
									}
									if(isset($_GET['erreur'])) {
										$err = $_GET['erreur'];
										if($err == 1){
											echo "<p> Email ou mot de passe déjà utilisé</p>";
										}else if($err == 2){
											echo "<p> Nom d'utilisateur ou mot de passe ou email incorrect</p>";
										}
									}
								?>
							</form>

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