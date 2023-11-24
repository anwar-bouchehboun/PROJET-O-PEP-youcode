<?php
include 'cnx.php';

$msg = "";

if (isset($_POST['cat'])) {
    $cat = $_POST['cat'];

    // Use prepared statement to prevent SQL injection
    $q = "SELECT * FROM `catégorie` WHERE nomcat = ?";
    $stmt = $cnx->prepare($q);
    $stmt->bind_param("s", $cat);
    $stmt->execute();
    $r = $stmt->get_result();

    if ($r->num_rows == 0) {
        // Use prepared statement for insertion
        $INSERT = $cnx->prepare("INSERT INTO `catégorie` (nomcat) VALUES (?)");
        $INSERT->bind_param("s", $cat);
        $success = $INSERT->execute();

        if ($success) {
            $msg = 'BIEN FAIT';
          
        } else {
            $msg = 'Erreur lors de l\'ajout à la base de données.';
        }
    } else {
        $msg = 'Catégorie déjà créée.';
    }
}
?>

<form class="text-center border container w-100 border-light p-5" action="./addCat.php" method="post">
    <p class="h4 mb-4">Catégorie </p>
    <!-- Name cat -->
    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-1" name="cat" placeholder="Categorie" required>
    <span class="text-danger"><?php echo $msg ?></span><br>
    <!--  button -->
    <button class="btn btn-success w-75 mb-3 btn-block" value="cat" type="submit">Ajouter</button>
</form>

