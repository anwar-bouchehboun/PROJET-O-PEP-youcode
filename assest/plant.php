<?php
include 'cnx.php';
include "./sidbar.php";
    $sql = "SELECT p.*,c.nomcat as categorie FROM plantes p,catégorie c
    where p.idcat=c.id_cat";
    $req = mysqli_query($cnx, $sql);
?>
<div class=" ">
      <h2 class="text-center border border-bottom-50 py-3 fs-1">PLANTE </h2>
      
<div class="d-flex w-100   justify-content-evenly  py-2">    
        <div class="table-responsive bg-success   h-50" style="width: 80%;">
              <table class="table text-center table-hover table-bordered   " >
                  <thead>
                  <tr>
                  <th class="" style="width: 10%;">ID</th>
                  <th class="">PLANTE</th>
                  <th class="">IMAGE</th>
                  <th class="">PRIX</th>
                  <th class="">categorie</th>
                  <th class="" style="width: 12%;">#</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                   while ($row = mysqli_fetch_assoc($req)) {
                      ?>
                          <tr class="table-info">
                              <td ><?php echo $row['idplante']; ?></td>
                              <td><?php echo $row['nomplante']; ?></td>
                              <td style="width: 10%;"><img src="../img/<?= $row['image'] ?>" class="w-50" alt="product"></td>
                              <td><?php echo $row['prix']; ?></td>
                              <td><?php echo $row['categorie']; ?></td>
                              <td class="d-flex gap-2 ">
                                  <button class="w-100  btn text-white btn-block btn-info" type="submit">  
                                    <a href="./updatePlante.php?updatee=<?php echo $row['idplante']; ?>">
                                 <ion-icon name="download-outline" class="text-white"></ion-icon></button>
                                  <button class="w-100 btn text-white btn-block btn-danger" type="submit"> 
                                     <a href="./delete.php?dellet=<?php echo $row['idplante']; ?>">
                                     <ion-icon name="trash-outline" class="text-white"></ion-icon></button>
                          </td>
                              
                          </tr>
                      <?php
                      }
                      ?>

              </tbody>

             </table>
             
          </div>
 
                  
          
     </div>
</div>
<?php include './footer.php' ?>
      

