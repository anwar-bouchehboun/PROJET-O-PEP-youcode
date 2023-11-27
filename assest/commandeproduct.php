<?php
include 'cnx.php';


session_start();
// $id = $_GET['add'];
$plant_id=$_POST['plant_id'];
$idpannier = $_POST['pannier_id'];
if (isset($_POST['add'])) {
    

    $idclient = $_SESSION['idclient'];
   
  
 
    date_default_timezone_set("Africa/Casablanca");
    $date = date("Y-m-d H:i:s");
    $insert = "INSERT INTO `commande`(`date`, `idutli`, `idplant`) VALUES ( '$date' ,'$idclient' ,'$plant_id')";
    $req = mysqli_query($cnx, $insert);
    if ($req) {
        //  $update="update"
        // echo $req;
        $delete = "DELETE FROM `panier` WHERE idpanier = $idpannier";
        $sup = mysqli_query($cnx, $delete);
        // // echo $sup;

        if ($sup) {
            header('location:client.php');
            exit;
        } else echo 'eror sup';
    } else {
        echo 'error';
    }
}

?>