<?php
include 'cnx.php';
session_start();
  
// Check if the necessary session variables are set and not empty
if (isset($_SESSION['prenom_client'], $_SESSION['nomclient'], $_SESSION['idclient']) &&
    !empty($_SESSION['prenom_client']) && !empty($_SESSION['nomclient']) && !empty($_SESSION['idclient'])) {
    
    
    $prenom = $_SESSION['prenom_client'];
    $nom = $_SESSION['nomclient'];
    $idclient = $_SESSION['idclient'];
    $idcli= $_SESSION['idclient'];;

} else {

    header("location: login.php");
    exit();
}




if (isset($_POST['pagelogin'])) {
  
    $_SESSION['prenom_client'] = "";
    $_SESSION['nomclient'] = "";
    $_SESSION['idclient'] = "";

    header("location: login.php");
    exit();
}

$total=0;
$sum="select sum(plantes.prix) from panier,plantes where panier.idpalante=plantes.idplante and idutili= $idcli";
 $somme=mysqli_query($cnx,$sum);
 if($somme){
     $s=mysqli_fetch_array($somme);
     $total=$s[0];
 }
 //search 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
     .list {
        display: none;
        overflow-y: auto; 
    max-height: 400px;
 }

 .list.active {

    display: block;
 }

</style>
</head>
<body>

    <nav class="navbar position-fixed top-0 w-100 navbar-expand-lg navbar-light bg-light" style="z-index: 2000;">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-success" href="#!"><i class="bi bi-flower1"></i> O'PEP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4"> 
                    <li></li> 
                </ul>
                <?php 
                $cnt=0;
     $pannier="SELECT count(idpanier) FROM `panier` where idutili=  $idclient";
     $repanier=mysqli_query($cnx,$pannier);
     if($repanier){
        $rows = mysqli_fetch_array($repanier);
        $count_client = $rows[0];
     }
      
     ?>
                <form class="d-flex gap-2" method="post" action="./client.php">

                    <span class="text-success fs-4"><?php echo $nom .' '.$prenom ?></span>
                    <button class="btn btn-outline-success" name="pagelogin">LogOut</button>
                    <button class="btn btn-outline-success" type="button" id="openCartButton">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-success text-white ms-1 rounded-pill"><?php echo $count_client ?></span>
                    </button>
                </form>
       
            </div>
        </div>
    </nav>
     <!-- panier -->
 
  
     <form action="./commandeproduct.php" method="post">
     <div class="list position-fixed bg-white" style="height: 100vh; width: 21rem;z-index: 2000; margin-left: 76%;top:3.6rem">
        <i class="bi bi-x-circle-fill position-absolute fs-4 text-center" style="right: 3%;top: .5%;cursor: pointer;color:white;" id="X"></i>
        <div class="list-buttom">
          <p class="pricecounter text-center p-0 m-0 pt-2 pb-2 fw-bold bg-success text-center" style=" color: white;">Total :$<?php echo  $total ?> </p>
      </div>

       <?php     
       $aff="SELECT panier.*,plantes.nomplante as nom,plantes.image as logo,plantes.prix as prix FROM panier,plantes where plantes.idplante=panier.idpalante and panier.idutili= $idclient";
      $res=mysqli_query($cnx,$aff);
      if($res){
         while($rowws=mysqli_fetch_assoc($res)){
           $product=$rowws['idpanier'];
        
 ?>
   <div class="col mb-2 mt-1 mx-auto" style="width: 90%;">
    <div class="card border-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <?php echo $rowws['nom'] ?>
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <img src="../img/<?php echo $rowws['logo'] ?>" class="w-25">
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300">$<?php echo $rowws['prix'] ?></i>
                </div>
                <input type="hidden" name="pannier_id" value="<?php echo  $product ?>">
               <input type="hidden" name="plant_id" value="<?php echo $rowws['idpalante'];?>" class="w-50 row btn text-white btn-block mx-5 mt-1 btn-danger" ></input> 
                <input type="submit" value="Add to Cart" name="add"  class="w-50 row btn text-white btn-block mx-5 mt-1 btn-danger">
            </div>
        </div>
    </div>
</div>

        <?php    }
                }
                elseif (!$res) {
                    die("Query failed: " . mysqli_error($cnx));
                }?>
      
      </div>
      </form>
    <header class="bg-success py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop Plante</h1>
                <p class="lead fw-normal text-white mb-0">WITH CATEGORIE</p>
            </div>
        </div>
    </header>

<section class="py-5">
<?php  
    $req="SELECT * FROM `catégorie`";
    $res=mysqli_query($cnx,$req);
     ?>
    <form action="" class="container w-50" method="POST">
        <Label class="fs-4 my-2 text-success">Categorie :</Label>
        <select name="cat" id="" class="form-control">
        <?php while($row=mysqli_fetch_array($res)){?>
            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
            <?php }?>
        </select>
        <input type="text" class="rounded-pill ps-2" placeholder="search"  name="keyword"  class=" row  text-white  mx-5 mt-1 ">
        <input type="submit" value="Choisir Categorie" name="Choisir" class="btn btn-primary py-2">
        <button   class="btn btn-success my-2"><a href="./client.php"   class="btn btn-success py-1 ">Afficher Toutes les Plantes</a></button>
    </form>
<div class="container px-4 px-lg-5 mt-5 ">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
   
    <?php
    $cat="";
    $query = "SELECT plantes.*  FROM plantes";
  
    if(isset($_POST['Choisir'])){
        if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
            $keyword="";
            $keyword=$_POST['keyword'];
            // echo $keyword;
            $query="SELECT plantes.*  FROM plantes where plantes.nomplante LIKE '%$keyword%'";
    
        }else if(isset($_POST['cat']) && !empty($_POST['cat'])) {
            $cat=$_POST['cat'];
            $query="SELECT  plantes.* FROM plantes where  idcat=$cat";
        }
    }
    
      

    $r=mysqli_query($cnx,$query);
    if($r){
        while ($row = mysqli_fetch_assoc($r)) {
          
       
     ?>
   <form action="client.php" method="post">
            <div class="col mb-5">
                <div class="card h-75  border border-success">
                    <!-- Product image-->
                    <img class="card-img-top" src="../img/<?php echo $row['image']; ?>"  />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php   echo $row['nomplante']; ?></h5>
                            <!-- <h6 class="fw-bolder"><?php   echo $row['catégorie']; ?></h6> -->

                            <!-- Product price-->
                            $<?php   echo $row['prix']; ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-success mt-auto" href="./ajouterProdClient.php?id=<?php echo $row['idplante'] ?>" name="add">ADD PRODUCT</a></div>
                    </div>
                </div>
            </div>
            </form>
           
          
         
            <?php   }
      }
      elseif (!$r) {
        die("Query failed: " . mysqli_error($cnx));
    }
    
    ?>
          
       
        </div>
    </div>
   
</section>
  <!-- Footer-->
  <footer class="py-5 bg-success">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website O'PEP 2023</p></div>
        </footer>
<script>
 var cart = document.querySelector('#openCartButton');
var list = document.querySelector('.list');
var closelist = document.querySelector('#X');

cart.addEventListener("click", function() {
    list.classList.add("active");
   
});

closelist.addEventListener("click", function () {
    list.classList.remove("active");
});

</script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      
</body>
</html>
