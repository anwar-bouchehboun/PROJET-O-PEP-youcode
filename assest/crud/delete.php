<?php
include_once '../cnx.php';
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE FROM `catégorie` WHERE id_cat=$id ";
    $res=mysqli_query($cnx,$delete);
    if($res){
        echo ' success';
        header("location: ../categorie.php");
        exit;
    }else echo 'no success';
}


?>