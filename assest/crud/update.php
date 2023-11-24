<?php
include '../sidbar.php';
include_once '../cnx.php';
$msg = "";
$nom="";
$id=$_GET['update'];
if (isset($_POST['send'])) {
    $nom = $_POST['cat'];
  
    $update = "UPDATE `catégorie` SET nomcat='$nom' WHERE id_cat='$id'";
    $res=mysqli_query($cnx,$update);
    if($res){
         header("location: ../categorie.php");
        exit;
    }else  $msg= 'no success';

}
?>

<form class="text-center border container w-100 border-light p-5" action="" method="post">
    <p class="h4 mb-4">Catégorie </p>
    <!-- Name cat -->
    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-1" name="cat" placeholder="Categorie" required>
    <span class="text-danger"><?php echo $msg ?></span><br>
    <!--  button -->
    <button class="btn btn-success w-75 mb-3 btn-block" name="send" >Ajouter</button>
</form>
<?php include '../footer.php' ?>