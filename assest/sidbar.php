<?php

session_start();
$msg = '';
if (isset($_SESSION['prenom_admin']) && isset($_SESSION['nom'])) {
       $msg = $_SESSION['prenom_admin'] . ' ' . $_SESSION['nom'];
}
else{
       header('Location: login.php');
       exit(); 
}

if(isset($_POST['logOut'])){
      
       session_unset();
       //detrui
       session_destroy();
       header('Location: login.php');
       exit();
   }


?>

<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Dadhbord</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
       <section class="w-100  d-flex" style="height: 100vh;">


              <div class="left w-25 bg-dark  h-100">
                     <form action="" class="w-100" method="post">
                            <h2 class="text-white bg-success  py-4 text-center">O'PEP DASHBORD</h2>
                            <div class=" ps-5">
                                   <div class=" pt-2 w-100  my-4">
                                          <a href="./addCat.php" class=" btn text-white w-75 btn-success p-3  btn-block">
                                                 AJOUTER LES DONNE </a>
                                   </div>
                                   <div class="  pt-2 w-100  my-4">
                                          <a href="./categorie.php" class="btn text-white w-75 btn-success p-3 btn-block" name="CATEGORIE">CATEGORIE</a>
                                   </div>
                                   <div class="  pt-2 w-100  my-4">
                                          <a href="./plant.php" class="btn text-white w-75 btn-success  p-3 btn-block" name="PLANTE">PLANTE</a>
                                   </div>
                                   <div class="  pt-2 w-100  my-4">
                                          <a href="./commande.php" class=" btn text-white w-75 btn-success p-3 btn-block" name="COMMANDE">COMMANDE</a>
                                   </div>

                                   <div class="   w-100  my-3">
                                          <h3 class="text-white "><?php echo $msg ?></h3>
                                   </div>
                                   <div class="   w-100   ">


                                          <button type="submit" class="btn btn-success w-75 mt-1  btn-block fs-4 fw-bold" name="logOut">logOut</button>


                                   </div>
                            </div>
                     </form>
              </div>



              <div class=" w-75 ">