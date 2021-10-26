<?php 
session_start();
require('dbConfig.php');
$chart_data = '';
  if(!empty($_POST['ligne']) && !empty($_POST['search']) && !empty($_POST['poste']) && !empty($_POST['kaba'])){
$_SESSION['id_ligne']=$_POST['ligne'];
$id_ligne=$_SESSION['id_ligne'];
$_SESSION['num_poste']=$_POST['poste'];
$num_poste=$_SESSION['num_poste'];
$_SESSION['nom_composant']=$_POST['kaba'];
$nom_composant=$_SESSION['nom_composant'];
$_SESSION['date']=$_POST['search'];
$date=$_SESSION['date'];
$sql2="SELECT  `id_kaba` FROM `kabas` WHERE `nom_composant`='$nom_composant'ORDER BY `id_kaba` ASC"    ;
$result2=$db->query($sql2);
$nb=$result2->num_rows;
$row2=$result2->fetch_assoc();
$id=$row2['id_kaba'];
$sql = "SELECT  `quantity`, `time` FROM `postekaba` WHERE `date`='$date' AND `fk_poste`='$num_poste' AND `fk_kaba`='$id' ORDER BY `time` ASC";
$result = $db->query($sql);
while($row = mysqli_fetch_array($result))
{
  $date1=$date." ".$row["time"];
 $chart_data .= "{ time:'".$date1."', quantity:".$row["quantity"]."}, ";

}
}
$chart_data = substr($chart_data, 0, -2);

?>


<!DOCTYPE html>
<html>
 <head>
  <title>Graph</title>
  <!-- Page's LOGO -->
  <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h3 class="text-center">Statistic</h3>   
   <br /><br />
    <div id="chart"></div>
  <div class = "container">
  <button class = "btn btn-warning btn-sm"><a href = "choix.php" style = "text-decoration: none; color: #333;">Back</a></button>
</div>
 </body>
</html>

<script>
Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'time',
 ykeys:['quantity'],
 labels:['quantity'],
 hideHover:'auto',
 stacked:true

});
</script>