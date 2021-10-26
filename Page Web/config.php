<?php
$con = mysqli_connect("localhost","root","","connected_kaba");
if(mysqli_connect_errno()){
    echo" Failed connection to the database" . mysqli_connect_errno();
}
else{
    echo" successfully connected "; 
}
?>