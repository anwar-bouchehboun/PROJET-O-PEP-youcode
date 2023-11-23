<?php
session_start(); 
include 'cnx.php';


$user_email = '';
$msg='';
if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
    // echo $user_email;
    if (isset($_POST['admin'])) {
     
        $update = $cnx->prepare("UPDATE  utlisateur SET idRole= '1' WHERE email = ?");
        if ($update) {
            $update->bind_param("s", $user_email);
            $success = $update->execute();
    
            if ($success) {
                $msg= "Role Admin successfully!";
            } else {
                $msg= "Error admin role!";
            }
            $update->close();
           
        }
      
    } 
    if(isset($_POST['client'])) {
        $update = $cnx->prepare("UPDATE utlisateur SET idRole = '2' WHERE email = ?");
        if ($update) {
            $update->bind_param("s", $user_email);
            $success = $update->execute();
    
            if ($success) {
                $msg= "Role client successfully!";
            } else {
                $msg="Error client role!";
            }
            $update->close();
           
        }
    }  
}
if(isset($_POST['login'])){
    header('Location: login.php');
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROLE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<form action="role.php" method="POST" class="p-4 w-75 mx-auto  border border-info" style="margin: 12% 0;">
<h2 class="fs-3 text-center pb-4">Choix Pour User :  </h2>
<ion-icon class="fs-1  "  name="person-outline" style="margin-left: 48%;"></ion-icon>
<div class=" w-50 py-3 mx-auto d-flex gap-2 ">
<button class="btn btn-info w-100 mt-2 btn-block fs-4 fw-bold" type="submit" name="admin" >Admin</button>
<button class="btn btn-info w-100 mt-2 btn-block fs-4 fw-bold" type="submit" name="client" >Client</button>
</div>
<div class="d-flex flex-column   justify-content-center">
<span class="text-success text-center  w-50 mx-auto fs-2"><?php echo $msg ?></span>
<button class="btn btn-info w-50 mt-2  btn-block fs-4 fw-bold" type="submit" name="login" style="margin-left: 25%;" >Login</button>

</div>

</form>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</body>
</html>