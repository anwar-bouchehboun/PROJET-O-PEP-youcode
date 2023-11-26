<?php
include "./sidbar.php";
include './cnx.php';
$req="SELECT c.*,u.nom as nomulisateur,u.prenom as prenom,u.email as email,r.Role as Role FROM commande c ,panier p ,utlisateur u ,role r
where c.idpanier=p.idpanier and p.idutili=u.id_utlisateur and r.idRole=u.idRole ";
$result=mysqli_query($cnx,$req);

if ($result) {
  

?>
<div class=" w-100 ">
<h2 class="text-center text-success my-3">Commande pour Client</h2>
<div class="container bg-success  mt-5" style="width: 83%;">
<table class="table text-center table-hover table-bordered ">
    <thead class="w-100">
      <tr>
        <th class="">ID_COMMANDE</th>
        <th class="w-25">DATE_commande</th>
        <th>ID_PANIER</th>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>EMAIL</th>
        <th>ROLE</th>
        <th class="" style="width: 10%;">#</th>
      </tr>
    </thead>
    <tbody></tbody>
      <?php  while ($row = mysqli_fetch_assoc($result)) {?>
      <tr class="table-info">
      <td><?= $row['idcommande'] ?></td>
        <td><?= $row['date'] ?></td>
        <td><?= $row['idpanier'] ?></td>
        <td><?= $row['nomulisateur'] ?></td>
        <td><?= $row['prenom'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['Role'] ?></td>
        <td>
        <button class="w-100 btn text-white btn-block btn-danger" type="submit"> 
                                     <a href="./delete.php?delletcommand=<?php echo $row['idcommande']; ?>">
                                     <ion-icon name="trash-outline" class="text-white"></ion-icon></button>
                                     </td>
      </tr>
<?php } ?>
    </tbody>
  </table>
  <?php } ?>
</div>
<?php
$countcommande = 0; 

$countreq = "SELECT count(*) FROM `commande`";
$count = mysqli_query($cnx, $countreq);

if ($count) {
    $row = mysqli_fetch_array($count);
    $countcommande = $row[0];
}
$count_client=0;
$countclientreq = "SELECT count(*) FROM `utlisateur` where idRole=2";
$countclient=mysqli_query($cnx,$countclientreq);
if($countclientreq){
  $rows = mysqli_fetch_array($countclient);
  $count_client = $rows[0];
}
?>
<div class="row container w-100">
   <h2 class="text-success">Statistique De Commande </h2>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-5 col-md-6 mb-4 ms-5">
            <div class="card border-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Nomber de command</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countcommande; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-5 col-md-6 mb-4 ms-5">
            <div class="card border-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nombre compte client</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_client; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

</div>
<?php include './footer.php' ?>