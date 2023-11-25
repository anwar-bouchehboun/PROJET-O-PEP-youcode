<?php
include 'cnx.php';
include "./sidbar.php";

    $sql = "SELECT * FROM catégorie order by id_cat Asc ";
    $req = mysqli_query($cnx, $sql);
   
?>
<div class=" ">
      <h2 class="text-center border border-bottom-50 py-3 fs-1">CATEGORIE </h2>
      
      <div class="d-flex  w-100 mx-auto   justify-content-evenly  py-2   ">  
        <div class="table-responsive bg-success   h-50" style="width: 50%;">
              <table class="table text-center table-hover table-bordered   border-dark" >
                  <thead>
                  <tr>
                  <th class="" style="width: 10%;">ID</th>
                  <th class="">Categorie</th>
                  <th class="w-25">#</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                   while ($row = mysqli_fetch_assoc($req)) {
                      ?>
                          <tr class="table-info">
                              <td ><?php echo $row['id_cat']; ?></td>
                              <td><?php echo $row['nomcat']; ?></td>
                              <td class="d-flex gap-2">
                              <button class="w-50 btn text-white btn-block btn-info">
                                 <a href="./update.php?update=<?php echo $row['id_cat']; ?>">
                                   <ion-icon name="download-outline"></ion-icon>
                                     </a>
                                  </button>

                                    <button class="w-50 btn text-white btn-block btn-info">
                                    <a href="./delete.php?delete=<?php echo $row['id_cat']; ?>">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a>
                                    </button>

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
<!-- <div class="w-75  d-flex mx-auto justify-content-evenly py-4">
          
                <div class="card bg-success  mb-3" style="max-width: 18rem;">
                            <div class="card-header text-white">COUNT</div>
                            <div class="card-body">
                                <h5 class="card-title text-white">Categorie </h5>
                                <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
             
                        </div>
                <div class="card bg-success mb-3 " style="max-width: 18rem;">
                        <div class="card-header text-white" >Bloc Note</div>
                            <div class="card-body">
                                <h5 class="card-title text-white">Categorie </h5>
                                <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                </div>
</div> -->
 <?php include './footer.php' ?>     
