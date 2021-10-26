<?php
session_start();
require('dbConfig.php');
if(isset($_POST['formconnexion'])){
	$mailconnect=htmlspecialchars($_POST['mailconnect']);
	$mdpconnect=sha1($_POST['mdpconnect']);
	if(!empty($mailconnect)AND !empty($mdpconnect)){
		$requser=$db->query("SELECT * FROM users WHERE mail='$mailconnect' AND motdepasse='$mdpconnect'");
		$userexist=$requser->num_rows;
		
		if($userexist==1){
			$userinfo=$requser->fetch_assoc();
			$_SESSION['id']=$userinfo['id'];

			
			$_SESSION['pseudo']=$userinfo['pseudo'];
			$_SESSION['mail']=$userinfo['mail'];
			$_SESSION['type']=$userinfo['type'];
			if($userinfo['type']=='admin'){
			header("Location:configuration.php");
			}
			else{
				header("Location:invited.php? id =".$_SESSION['id']);
			}

		}
		else{
			$erreur="mauvees mdp ou mail";
		}

	}
	else{
		$erreur="Tous les champs doivent etre complétés!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="my-login.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.jpg" />

</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg" alt="logo">
					</div>
					<div class="card fat">
						<!--<img src="2.jpg" class="avatar">-->
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email" >E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="mailconnect" placeholder="enter your email" required autofocus autocomplete="off">
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">
										<a href="requestReset.php" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="mdpconnect" required  placeholder="New Password">
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>
								
								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block"  name="formconnexion">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<?php
 			if(isset($erreur)){
 				echo '<font color="red" align="center">'.$erreur.'</font>';
 			}
 		?>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</body>
</html>