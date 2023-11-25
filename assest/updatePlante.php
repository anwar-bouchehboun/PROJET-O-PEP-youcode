<?php
include './sidbar.php';
include './cnx.php';
$nomplant = "";
$img = "";
$prix = "";
$idcat = "";
$id = isset($_GET['updatee']) ? $_GET['updatee'] : null;

if ($id !== null) {
    $req = "SELECT p.* FROM plantes p WHERE p.idplante ='$id' ";
    $res = mysqli_query($cnx, $req);

    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $nomplant = $row['nomplante'];
            $img = $row['image'];
            $prix = $row['prix'];
            $idcat = $row['idcat'];

        }
    }
}
$prixnew="";
if(isset($_POST['submit'])){
    $prixnew=$_POST['prixnew'];
    $update = $cnx->prepare("UPDATE `plantes` SET `prix` = ? WHERE idplante = ?");
    $update->bind_param("ii", $prixnew, $id);
    $result = $update->execute();
    if($result){
        header('location:plant.php');
        exit;
    }else echo 'no';
    
}
?>
<div class="container w-75 border border-success my-1">

<form class="w-100 border-light p-4" action="" method="post" >
<img src="../img/<?php echo $img; ?>" class="   " style="width:40%;margin-left: 30%;"> 
<p class="h4 mb-4 text-center">Plante </p>
<p class="text-center" name="id">Plante N° :<?php echo $id ?> </p>
 

<div class="d-flex">
<label class=" w-25 text-success fs-4 mb-2">Nom Plante : </label>
<input type="text" id="Nom" class="form-control mb-4" name="nomplante"  placeholder="Nom Plante" value="<?php echo $nomplant; ?>" disabled required>
</div>

<div class="d-flex mt-1">
<label class=" w-25 text-success fs-4 mb-2"> Prix:</label>
<input type="text" id="prix" class="form-control mb-4" name="prix" placeholder="prix" value="<?php echo $prix; ?>" disabled required> 
</div>
<input type="text" id="prix" class="form-control mb-4" name="prixnew" placeholder="prix"  required> 
<div class="d-flex">
<label class=" w-25 text-success fs-4 mb-2"> ID-Cat:</label>
<input type="text" id="idcat" class="form-control mb-4" name="cat" placeholder="categorie" value="<?php echo $idcat; ?>" disabled required> 
</div>
  
 
<input class="btn btn-success w-50   mb-3 btn-block" style="margin-left: 20%;" value="UPDATE" name="submit" type="submit"></input>


</form>

</div>
<?php include './footer.php'?>
