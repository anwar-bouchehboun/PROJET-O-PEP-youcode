<?php 
include 'cnx.php';
session_start();
$msg='';
$msg = $_SESSION['prenom_admin'] . ' ' . $_SESSION['nom'];


if(isset($_POST['login'])){

    $_SESSION['prenom_admin']="";
    $_SESSION['nom']="";
    header("location: login.php");
    exit;
}


            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //     foreach ($_POST as $key => $value) {
            //       $pos=strpos($key, "cherche") ;
            //         if ($pos=== 0) {
            //            echo $pos;
            //             switch ($value) {
            //                 case 'DASHBORD':
                              
            //                     echo "DASHBORD button was clicked!";
            //                     break;
            //                 case 'CATEGORIE':
                              
            //                     echo "CATEGORIE button was clicked!";
            //                     break;
            //                 case 'PLANTE':
                               
            //                     echo "PLANTE button was clicked!";
            //                     break;
            //                 case 'COMMANDE':
                               
            //                     echo "COMMANDE button was clicked!";
            //                     break;
            //                 default:
                               
            //                     break;
            //             }
            //         }
            //     }
            // }
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
    <section class="w-100   d-flex" style="height: 100vh;">


          <div class="left w-25 bg-dark  h-100"> 
            <form action="dashbord.php" class="w-100" method="post">
                            <h2 class="text-white bg-success  py-4 text-center">O'PEP DASHBORD</h2>
                <div class=" ps-5">
                    <?php include 'buttonfilter.php'; ?>
                
                     <div class="   w-100  my-5">
                                 <h3 class="text-white "><?php echo $msg ?></h3>
                     </div>
                      <div class="   w-100   ">
                           <button class="btn btn-success w-75 mt-1  btn-block fs-4 fw-bold" type="submit" name="login"  >LogOut</button>

                     </div>
                 </div>
                 </form>   
          </div>

 <div class=" w-75 ">
    <?php include 'categorie.php'; ?>
    <?php include 'plant.php'; ?>
 </div>

 
</section> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>