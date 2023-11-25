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
<h3 class="text-success fs-4">Nomber de command : </h3>



</div>
<?php include './footer.php' ?>