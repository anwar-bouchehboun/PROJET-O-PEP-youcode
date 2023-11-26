<?php
include './sidbar.php';
include_once './cnx.php';
$msg = "";
$nom="";
$id=$_GET['update'];
if (isset($_POST['send'])) {
    $nom = $_POST['cat'];
  
    $update = "UPDATE `catégorie` SET nomcat='$nom' WHERE id_cat='$id'";
    $res=mysqli_query($cnx,$update);
    if($res){
         header("location: categorie.php");
        exit;
    }else  $msg= 'no success';

}
?>
<div class="w-50 container border-success border mt-5">
<form class="text-center   w-100  p-5" action="" method="post">
    <p class="h4 mb-4">Catégorie </p>
    <p class="fs-3">ID Categorie : <?php  echo $id ?></p>
    <!-- Name cat -->
    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-1" name="cat" placeholder="Categorie" required>
    <span class="text-danger"><?php echo $msg ?></span><br>
    <!--  button -->
    <button class="btn btn-success w-75 mb-3 btn-block" name="send" >UPDATE</button>
</form>
</div>
<?php include './footer.php' ?>