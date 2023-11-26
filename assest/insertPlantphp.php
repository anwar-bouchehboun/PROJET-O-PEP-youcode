<?php
include 'cnx.php';

if (isset($_POST['submit']) && isset($_FILES['image'])) {
    $nom = $_POST['nomplante'];
    $prix = $_POST['prix'];
    $idcat = $_POST['idcat'];
    $i_name = $_FILES['image']['name'];
    $i_tmp = $_FILES['image']['tmp_name'];

    $si_extension = pathinfo($i_name, PATHINFO_EXTENSION);
    $i_lower = strtolower($si_extension);
    $arrytype = array("jpg", "jpeg", "png");

    if (in_array($i_lower, $arrytype)) {
        $new_image = uniqid("IMG-", true) . '.' . $i_lower;
        $upload_path = '../img/' . $new_image;
        move_uploaded_file($i_tmp, $upload_path);

        $insert = $cnx->prepare("INSERT INTO plantes (nomplante, image, prix, idcat) VALUES (?, ?, ?, ?)");
        $insert->bind_param("ssii", $nom, $new_image, $prix, $idcat);

        if ($insert->execute()) {
            header('location: plant.php');
            exit;
        } else {
            echo "Something went wrong, please retry later";
        }
    } else {
        echo 'Error: invalid file extension';
    }
}
?>
