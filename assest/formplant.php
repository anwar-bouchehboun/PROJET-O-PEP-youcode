<?php 
include 'cnx.php';
$req="SELECT * FROM `catégorie`";
$res=mysqli_query($cnx,$req);
?>
<form class="text-center border container w-100 border-light p-4" action="./insertPlantphp.php" method="post" enctype="multipart/form-data">

<p class="h4 mb-4">Plante </p>

<input type="text" id="Nom" class="form-control mb-4" name="nomplante" placeholder="Nom Plante" required> 
<input type="file" accept="image/png, image/jpeg"    id="image" class="form-control mb-4" name="image" placeholder="image" required>
<input type="text" id="prix" class="form-control mb-4" name="prix" placeholder="prix" required> 
<p class="w-100 mb-5">  
    <select name="idcat" id="Ctegorie" class="w-100 py-1   custom-select">

<?php while($row=mysqli_fetch_array($res)){?>
                      
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
<?php }?>
                </select></p> 
<input class="btn btn-success w-75 mb-3 btn-block" name="submit" type="submit" value="Ajouter"></input>


</form>

