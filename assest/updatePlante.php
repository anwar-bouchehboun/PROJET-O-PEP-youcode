<?php
include './sidbar.php';
include './cnx.php';
$id=$_GET['updatee'];
if(isset($_GET['updatee'])){


$nomplant="";
$img="";
$prix="";
$idcat="";
$req="SELECT p.* FROM plantes p
where p.idplante ='$id' ";
$res=mysqli_query($cnx,$req);
if($res){
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $nomplant = $row['nomplante'];
        $img = $row['image'];
        $prix = $row['prix'];
        $idcat = $row['idcat'];
       echo $img;
      
    }
}
}
?>
<div class="container w-50 border border-success my-5">

<form class="text-center   w-100 border-light p-4" action="./updatePlante.php" method="post" >

<p class="h4 mb-4">Plante </p>
<p>Plante N° :<?php echo $id ?> </p>
<input type="text" id="Nom" class="form-control mb-4" name="nomplante"  placeholder="Nom Plante" value="<?php echo $nomplant; ?>" required> 
<input type="file" accept="image/png, image/jpeg"    id="image" class="form-control mb-4" name="image" placeholder="image" value="<?php echo $img; ?>" required>
<input type="text" id="prix" class="form-control mb-4" name="prix" placeholder="prix" value="<?php echo $prix; ?>" required> 
<p class="w-100 mb-5">  
    <select name="idcat" id="Ctegorie" class="w-100 py-1   custom-select">
          <?php   $req="SELECT * FROM `catégorie`";
           $res=mysqli_query($cnx,$req);    ?>
           <?php while($row=mysqli_fetch_assoc($res)){?>
                      
                        <option value="<?php echo    $idcat?>"><?php echo $row['nomcat'] ?></option>
              <?php }?>
                </select></p> 
<input class="btn btn-success w-75 mb-3 btn-block" value="UPDATE" name="submit" type="submit"></input>


</form>

</div>
<?php include './footer.php'?>
