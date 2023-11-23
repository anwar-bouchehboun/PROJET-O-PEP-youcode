<?php
include 'cnx.php';
if (isset($_POST['PLANTE'])) {
    $sql = "SELECT * FROM `plantes`";
    $req = mysqli_query($cnx, $sql);
?>
<div class=" ">
      <h2 class="text-center border border-bottom-50 py-3 fs-1">PLANTE </h2>
      
      <div class="d-flex w-100 mx-auto   justify-content-evenly  py-2"> 
    <div class="d-flex flex-column align-items-md-center">
         <!--  -->
         <div class="w-75  d-flex mx-auto gap-4 py-4">
          
          <div class="card bg-success  mb-3" style="max-width: 18rem;">
                      <div class="card-header text-white">COUNT</div>
                      <div class="card-body">
                          <h5 class="card-title text-white">plante </h5>
                          <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
       
                  </div>
          <div class="card bg-success mb-3 " style="max-width: 18rem;">
                  <div class="card-header text-white" >Bloc Note</div>
                      <div class="card-body">
                          <h5 class="card-title text-white">plante </h5>
                          <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
          </div>
    </div>
          
 
         <!--  -->
    
        <div class="table-responsive bg-success   h-50" style="width: 100%;">
              <table class="table text-center table-hover table-bordered   border-dark" >
                  <thead>
                  <tr>
                  <th class="" style="width: 10%;">ID</th>
                  <th class="">PLANTE</th>
                  <th class="">IMAGE</th>
                  <th class="">PRIX</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                   while ($row = mysqli_fetch_assoc($req)) {
                      ?>
                          <tr class="table-info">
                              <td ><?php echo $row['idplante']; ?></td>
                              <td><?php echo $row['nomplante']; ?></td>
                              <td><?php echo $row['image']; ?></td>
                              <td><?php echo $row['prix']; ?></td>
                              <td class="d-flex gap-2">
                                  <button class="w-75 btn text-white btn-block btn-info" type="submit"><ion-icon name="download-outline"></ion-icon></button>
                                  <button class="w-75 btn text-white btn-block btn-info" type="submit"><ion-icon name="trash-outline"></ion-icon></button>
                          </td>
                              
                          </tr>
                      <?php
                      }
                      ?>

              </tbody>

             </table>
             
          </div>
  </div>
          <div  class="  bg-white border border-success p-2" style="width:35%;">
                <form class="text-center border container w-100 border-light p-5" action="login.php" method="post">

                    <p class="h4 mb-4">Plante </p>
                  
                    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="nomplante" placeholder="Nom Plante" required>
                    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="image" placeholder="image" required>
                    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="prix" placeholder="prix" required>
                    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="idcat" placeholder="Ctegorie" required>
                  
                    <button class="btn btn-success w-75 mb-3 btn-block" type="submit">Ajouter</button>
                   

                </form>
        </div> 
                        
          
     </div>
</div>

      
<?php } ?>
