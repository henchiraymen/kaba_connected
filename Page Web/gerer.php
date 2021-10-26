<?php 
    session_start();
    require('dbConfig.php');

    $msg = '';
    $msgClass = '';
    
    if(isset($_POST['submit'])){
        $pseudo     = htmlspecialchars($_POST['pseudo']);
        $mail           =htmlspecialchars($_POST['mail']);
        $mdp         =sha1($_POST['motdepasse']);
        $type           =htmlspecialchars($_POST['type']);

        $sql = "INSERT INTO users(pseudo, mail,motdepasse,type) VALUES('$pseudo', '$mail','$mdp', '$type')";
        $result = mysqli_query($db, $sql);
        if($result) {
            $msg = "Data inserted successfully";
            $msgClass="alert-success";
        }
        else {
            $msg = "Data not inserted";
            $msgClass="alert-danger";
        }
    }
 ?>
<?php 
    // Delete Student
if (isset($_POST['del_data'])) {
    $sql="SELECT `type` FROM `users` WHERE `id`= ".$_POST['id'];
    $rsl=mysqli_query($db,$sql);
    $row=$rsl->fetch_assoc();
    $type=$row['type'];
    if($type=='admin'){
        $erreur="admin couldn't be deleted";
        echo $erreur;

    }
    else{
	$query="DELETE FROM users WHERE id=".$_POST['id'];
	$result = mysqli_query($db, $query);
	if($result){
        $msg= "Data deleted successfully";
        $msgClass="alert-success";
	}
	else {
        $msg= "Data deleted successfully";
        $msgClass="alert-danger";
    }
}}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.jpg" />

    <!-- Data Tables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">

      <!-- Modal CSS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
   
    <!-- Title  -->
    <title>Configuration</title>   
 </head>

  <body>
    <h2 style = "text-align: center; padding: 20px; background-color: #004089;; color: #fff;">Configuration </h2>
    <div class = "container" style = "margin-top: 40px; padding: 30px;">
    <?php
     if (isset($msg)) { ?>
        <div class="form-group">
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?>
            </div>
        </div>
        <?php
        }
	?>
  
     <button type="button" class="btn btn-info btn-sm mb-5" style="float:right" data-toggle="modal" data-target="#myModal">ADD NEW USER</button>

   

    <table id="example" class="display responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th>No#</th>
                <th>pseudo</th>
                <th>mail</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
        <button type="button" class="btn btn-info btn-sm mb-5" style="float:left" data-toggle="modal" ><a href = "setting.php" style = "text-decoration: none; color: #fff;">Back</a></button>


<?php
    require 'dbConfig.php';
    $sql = "SELECT * FROM users";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id=$row["id"];
            $pseudo          =  $row["pseudo"];
            $mail      =  $row["mail"];       
            $type   =  $row["type"];
            
?>

            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $pseudo; ?></td>
                <td><?php echo $mail; ?></td>
                <td><?php echo $type; ?></td>
                <td>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <a href="index.php?id=<?php echo $id; ?>"><button class="btn btn-danger btn-sm" name="del_data"><i class="fas fa-trash"></i></button></a>
                    </form>
                </td>
             <?php }  ?>
            </tr>
         <?php } ?>  
     </tbody>
  </table>



  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD NEW USER </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <input type="text" name="pseudo" class="form-control" placeholder="Enter your name" required autofocus autocomplete="off">
            </div>
          
              <div class="form-group">
                <input type="email" name="mail" class="form-control" placeholder="Enter your email" required autocomplete="off"s>
            </div>

              <div class="form-group">
                <input type="password" name="motdepasse" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <select class="form-control" id="music-preference" name="type">
                <option value="admin">admin</option>
                <option value="invited">invited</option>
                </select>
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-success btn-sm">
           </form> 
        </div>
       
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



    
    <script src="https://code.jquery.com/jquery-3.4.0.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <!-- Style CSS -->
    </body>
</html>