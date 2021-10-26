<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="my-login.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.jpg" />

</head>
<body class="my-login-page">
    <section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg" alt="LEONI login page">
                    </div>
                 <div class="card fat">
                    <form method="POST" text-align="center">
                        <h4>Update PASSWORD</h4> 
                        <div class="form-group">
                            <label for="password">
                            </label>
                            <input id="password" type="password" class="form-control" name="password" required data-eye>
                            <div class="invalid-feedback">
                                Password is required
                            </div>
                        </div>
                        <div class="form-group m-0">
                            <button type="submit" class="btn btn-primary btn-block">
                               Update Password
                            </button>
                            <a href="index.php"> Login</a>
                        </div>
                    </form>
                </div>  
                </div>
            </div>
        </div>
    </section>                
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="my-login.js"></script>
</body>
</html>
<?php
 include("dbConfig.php");
if(!isset($_GET["code"])){
     exit("can't find the page");
 }
 $code=$_GET["code"];
 $getEmailQuery= mysqli_query($db, "SELECT email FROM resetpasswords WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery)== 0){
     exit("Can't find page");
    } 
if(isset($_POST["password"])){
    $pw=$_POST["password"];
    $pw=sha1($pw);
    $row=mysqli_fetch_array($getEmailQuery);
    $email=$row["email"];
    $query=mysqli_query($db,"UPDATE users SET motdepasse='$pw' WHERE mail='$email'");
     if($query){
         $query=mysqli_query($db,"DELETE FROM resetpasswords WHERE code='$code'");
         exit("Password Updated");
     }
     else{
         exit("Something went wrong");
     }
}
?>

