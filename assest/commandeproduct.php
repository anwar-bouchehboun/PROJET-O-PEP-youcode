<?php
include 'cnx.php';


// $utli= $_SESSION['idcl']=$idclient;
// $_SESSION['idplant']=$idplante;
session_start();

if (isset($_GET['add'])) {
    $idclient = $_SESSION['idclient'];
    $id = $_GET['add'];

    date_default_timezone_set("Africa/Casablanca");
    $date = date("Y-m-d H:i:s");
    $insert = "INSERT INTO `commande`(`date`, `idutli`, `idplant`) VALUES ( '$date' ,'$idclient' ,'$id')";
    // $insert="INSERT INTO `panpla`(`idpanier`, `idplante`, `date`) VALUES ('[$id','[value-2]','$date')";
    // "INSERT INTO `commande`( `date`, `id_panier`, `idutli`) VALUES ('[value-2]','[value-3]','[value-4]')";
    $req = mysqli_query($cnx, $insert);
    if ($req) {
        //  $update="update"
        $delete = "DELETE FROM `panier` WHERE idpalante = $id";
        $sup = mysqli_query($cnx, $delete);
        echo $sup;

        if ($sup) {
            header('location:client.php');
            exit;
        } else echo 'hmid s9at';
    } else {
        echo 'error';
    }
}
