         <?php
session_start();
$sql=new PDO('mysql:host=localhost;dbname=connected_kaba','root','');
$bdd=new mysqli("localhost","root","","connected_kaba");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CONNECTED KABA</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3><i class="fas fa-cogs"></i>Setting</h3>
      </div>
      <div class="right_area">
        <a href="deconnexion.php" class="logout_btn"><i class="fa fa-power-off"></i>Logout</a>
      </div>
      <div class="left_area">
        <a href="invited.php" class="switch_btn"><i class="fas fa-user-secret"></i>SWITCH TO INVITED MODE</a>
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
        <img src="img/avatar.jpg" class="profile_image" alt="">
        <h4><?php echo $_SESSION['pseudo']?> <br>
          <span class="user-status">
            <i class="fas fa-circle" style="color: green;"></i>
            <span>Online</span>
          </span>
      </h4>
      </center>
      <a href="configuration.php"><i class="fas fa-desktop"></i><span>HOME</span></a>
      <a href="gerer.php" ><i class="fas fa-address-card"></i>CONFIGURE USER</span></a>
      <a href="#content" ><i class="fas fa-database"></i>CONFIGURE DATA</span></a>

</div>
    
    <!--sidebar end-->

    <div class="content" >
      <div class="modal-body">
        <div class="container" id="container">
           <section>
            <div class="form-container sign-in-container">
              <form action="#" method="POST">
                <h1>The line's name</h1>
                <input type="text" name="linename" placeholder="line's name" required autocomplete="off" />
                <input type="submit" name="Configure1">
              </form>
            </div>
          </section>      
          <section>
            <div class="form-container sign-up-container">
              <form action="#" method="POST">
               <input type="text" name="line" placeholder="line " required autocomplete="off">
               <input type="text" name="postename" placeholder="poste" required autocomplete="off">
               <input type="text" placeholder="componenet's ref" name="componentname" required autocomplete="off"/><br><br>
                <select name="taillekaba">
                  <option value="1">kaba1</option>
                  <option value="2">kaba2</option>
                  <option value="3">kaba3</option>
                </select><br><br>
                <input type="submit" name="Configure2">
              </form>
            </div>
           <div class="overlay-container">
            <div class="overlay">
              <div class="overlay-panel overlay-left">
                <button class="ghost" id="signIn">back</button>
              </div>
              <div class="overlay-panel overlay-right">
                <h1>Continue</h1>
                <p>Enter the kaba's and the poste's information </p>
                <button class="ghost" id="signUp">continue</button>
              </div>
            </div>
          </div>
      </div>
    </div>
<?php

if (isset($_POST['Configure1'])) {
 $linename=$_POST['linename'];
  if(!empty($_POST['linename'])){
   
    
    $insertline=$sql->prepare("INSERT INTO `lignes`( `nom_ligne`) VALUES (?)");
    $insertline-> execute(array($linename));  
  }
  }
  

if(isset($_POST['Configure2'])){
    $postename=$_POST['postename'];
    $kabaref=$_POST['taillekaba'];
    $componant=$_POST['componentname'];
    $line=$_POST['line'];
  if (!empty($_POST['postename']) && !empty($_POST['componentname']) && !empty($_POST['line'])) {
      
       $insertkaba=$sql->prepare("INSERT INTO `kabas`( `nom_composant`, `taille`)  VALUES (?,?)");
      $insertkaba-> execute(array($componant,$kabaref));
         $rsl = $bdd->query("SELECT * FROM `lignes` WHERE `nom_ligne`='$line'");          
        while($row = $rsl->fetch_assoc()){
            $id=$row['id_ligne'];
            foreach((array)$id as $value){
          $insertposte=$sql->prepare("INSERT INTO `postes` (`fk_ligne`, `num_poste`) VALUES (?,?)");
      $insertposte-> execute(array($value,$postename));
      
}}
    
 }
}
    

?> 
  <style >

  .modal-body{display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: 'Montserrat', sans-serif;
  height: 100vh;
  margin: -20px 0 50px;
}


   h1 {
  font-weight: bold;
  margin: 0;
  color: white;
}

h2 {
  text-align: center;
}

p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}

span {
  font-size: 12px;
}

a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}

button {
  border-radius: 20px;
  border: 1px solid rgba(0,0,0,0.5);
  background-color: rgba(0,0,0,0.5);;
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}

button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

button.ghost {
  background-color: transparent;
  border-color: rgba(0,0,0,0.5);;
}

form {
  
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
}

input {
  background-color: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}

.container {
  background-color: transparent;
  border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
    min-height: 480px;
    
}

.form-container {
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.sign-in-container {
  left: 0;
  width: 50%;
  z-index: 2;
}

.container.leftt-panel-active .sign-in-container {
  transform: translateX(100%);
}

.sign-up-container {
  left: 0;
  width: 50%;
  opacity: 0;
  z-index: 1;
}

.container.right-panel-active .sign-up-container {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: show 0.6s;
}

@keyframes show {
  0%, 49.99% {
    opacity: 0;
    z-index: 1;
  }
  
  50%, 100% {
    opacity: 1;
    z-index: 5;
  }
}

.overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

.container.right-panel-active .overlay-container{
  transform: translateX(-100%);
}

.overlay {
  background: #3b3391;
  background: -webkit-linear-gradient(to right, #19B3D3, #19B3D3);
  background: linear-gradient(to right, #19B3D3, #19B3D3);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 0 0;
  color: #FFFFFF;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
    transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

.overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 40 40px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay-left {
  transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
  transform: translateX(0);
}

.overlay-right {
  top: 10px;
  right: 0;
  transform: translateX(0);
}

.container.right-panel-active .overlay-right {
  transform: translateX(20%);
}

.social-container {
  margin: 20px 0;
}

.social-container a {
  border: 1px solid #19B3D3;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 5px;
  height: 40px;
  width: 40px;
}

footer {
    background-color: #3b3391;
    color: #3b3391;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}

    </style>
<script type="text/javascript" src="js/script.js"></script>
  
  </body>
</html>


