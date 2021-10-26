<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
          <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Page's LOGO -->
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <!-- Data Tables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">

      <!-- Modal CSS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CONNECTED KABA</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css.css">
        <link type="text/css" rel="stylesheet" href="style.css"/>    
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
        <script src="jquery.min.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        
        
    </head>
    <style>

    
    
.select-boxes{width: 280px;text-align: center;}
select {
    background-color: #F5F5F5;
    border: 1px double #15a6c7;
    color: #1d93d1;
    font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;
}
select option{
    font-family: Georgia;
    font-size: 14px;
}
</style>
     <script type="text/javascript">
$(document).ready(function(){
    $('#ligne').on('change',function(){
        var ligneID = $(this).val();
        if(ligneID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_ligne='+ligneID,
                success:function(html){
                    $('#poste').html(html);
                    $('#kaba').html('<option value="">Select poste first</option>'); 
                }
            }); 
        }else{
            $('#poste').html('<option value="">Select ligne first</option>');
            $('#kaba').html('<option value="">Select poste first</option>'); 
        }
    });
    
    $('#poste').on('change',function(){
        var IDposte = $(this).val();
        if(IDposte){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_poste='+IDposte,
                success:function(html){
                    $('#kaba').html(html);
                }
            }); 
        }else{
            $('#kaba').html('<option value="">Select poste first</option>'); 
        }
    });
});
</script>

    <body id="page-top">
        <!-- Navigation-->
        
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">LEONI</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="menu-bar" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio"><i class="fas fa-align-left"></i>Configure</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="setting.php"><i class="fas fa-cog"></i>SETTING</a>
                        </li>    
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="img/avataaars.svg" alt="" /><!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Acceuil</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-user-shield"></i></div>
                    <div class="divider-custom-line"></div>
                </div> 
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Welcom to CONNECTED KABA project page</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Configure</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-cog"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5" style="left: 370px; text-align: center;">CONFIGURE 
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#potfolioconfigure">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"></div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/config.jpg" alt="" />
                        </div>
                    </div>
                 

                <!-- Portfolio Grid Items-->
                
        </section>
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0" >
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">Zone Industrielle Messaadine Route de M'Saken ; Sousse، Boulevard <br> Dr Taieb Hachicha،<br />  Messadine 4000</p>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Portfolio Modals--><!-- Portfolio Modal 1-->
        <!-- Portfolio Modals--><!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="potfolioconfigure" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label">Configure</h2><br><br>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-cog"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                 <!-- Specify what data to GET-----1-->
                                        <!-- CHOOSE THE KABA REFERENCE-->
                                        <form method="POST" action="choix.php">
                                           <div class="w3-container w3-white w3-margin w3-padding-large" >
        
                                                  <br>
                                                  <div class="select-boxes" style="position: relative;left: 200px;">
                                                    
                                            <?php
                                            //Include database configuration file
                                            include('dbConfig.php');
                                            
                                            //Get all ligne data
                                            $query = $db->query("SELECT * FROM `lignes` WHERE 1 ORDER BY `id_ligne` ASC");
                                            
                                            //Count total number of rows
                                            $rowCount = $query->num_rows;
                                            ?>
                                            <select name="ligne" id="ligne" required>
                                                <option value="">Select ligne</option>
                                                <?php
                                                if($rowCount > 0){
                                                    while($row = $query->fetch_assoc()){ 
                                                        echo '<option value="'.$row['id_ligne'].'">'.$row['nom_ligne'].'</option>';
                                                    }
                                                }else{
                                                    echo '<option value="">ligne not available</option>';
                                                }
                                                ?>
                                            </select>
                                            
                                            <select name="poste" id="poste">
                                                <option value="">Select ligne first</option>
                                            </select>
                                            
                                            <select name="kaba" id="kaba">
                                                <option value="">Select poste first</option>
                                            </select>
                                            </div>

                                                  
                                                    
                                              </div>
                                    <br><br>
                                <input type="date" name="search"><br><br>
                                <input type="submit" name="submit" class="btn btn-info">
                                                
                            </form>            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        
        <!-- Core theme JS-->
        <script type="text/javascript" src="verif.js"></script>
        <script src="js/scripts.js"></script>
         <script src="https://code.jquery.com/jquery-3.4.0.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    
 <script src="https://code.jquery.com/jquery-3.4.0.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    </body>
</html>
