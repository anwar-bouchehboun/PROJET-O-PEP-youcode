<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd = "opep";

$cnx=new mysqli($servername,$username,$password,$bd);

if($cnx->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

?>