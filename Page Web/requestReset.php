<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'dbConfig.php';
if (isset($_POST["email"])) {
    $emailTo=$_POST["email"];
    $code=uniqid(true);
    $query=mysqli_query($db,"INSERT INTO resetpasswords(code,email) VALUES('$code','$emailTo')");
    if(!$query){
        exit("Error");
    }
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username   = 'resetpass125@gmail.com';
    $mail->Password   = 'leonileoni';
    $mail->setFrom('resetpass125@gmail.com', 'LEONI');
    $mail->addAddress("$emailTo");     // Add a recipient
    $mail->addReplyTo('no-reply@gmail.com', 'No reply ');
    $mail->AddAttachment("img/innovation.png"); 

    //Recipients
    $mail->setFrom('resetpass125@gmail.com', 'LEONI');
    $mail->addAddress("$emailTo");     // Add a recipient
    $mail->addReplyTo('no-reply@gmail.com', 'No reply ');
    $mail->AddAttachment("img/innovation.png");
    
    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $url="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]). "/resetPassword.php?code=$code";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your password reset link';
    $mail->Body    = "<h1>You requested a password reset</h1>
                    Click <a href='$url'>this link </a> to reset your password ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Reset password link has been sent to you email';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: ,$mail->ErrorInfo";
    
                        }
exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="my-login.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.ico" />

</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg" alt="">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Forgot Password</h4>
							<form method="POST" class="my-login-validation" novalidate="New Password">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus autocomplete="off">
									<div class="invalid-feedback">
										Email is invalid
									</div>
									<div class="form-text text-muted">
										By clicking "Reset Password" we will send a password reset link
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Reset Password
									</button>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="C:/Users/insijem/Desktop/templates//my-login.js"></script>
</body>
</html>