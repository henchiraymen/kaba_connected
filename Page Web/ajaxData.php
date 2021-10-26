<?php
//Include database configuration file
include('dbConfig.php');

if(isset($_POST["id_ligne"]) && !empty($_POST["id_ligne"])){
    //Get all poste data
    $query = $db->query("SELECT * FROM `postes` WHERE `fk_ligne` = ".$_POST['id_ligne']." ORDER BY `num_poste` ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display postes list
    if($rowCount > 0){
        echo '<option value="">Select poste</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id_poste'].'">'.$row['num_poste'].'</option>';
        }
    }else{
        echo '<option value="">Poste not available</option>';
    }
}

if(isset($_POST["id_poste"]) && !empty($_POST["id_poste"])){
    //Get all city data
    $query = $db->query("SELECT * FROM kabas WHERE 1 ORDER BY id_kaba ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select component</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['nom_composant'].'">'.$row['nom_composant'].'</option>';
        }
    }else{
        echo '<option value="">component not available</option>';
    }
}
?>