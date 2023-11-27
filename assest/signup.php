<?php
session_start();
include 'cnx.php';
$email = "";
$Error= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$email = $_POST["Email"];
$q = "SELECT * FROM utlisateur WHERE email = '$email'";
$r = mysqli_query($cnx,$q);

if($r->num_rows == 0) {
   
        $password_hash = password_hash($_POST['Password'], PASSWORD_BCRYPT);
        $INSERT = $cnx->prepare("INSERT INTO utlisateur (`nom`, `prenom`, `email`, `password`) VALUES (?, ?, ?, ?)");
        // $INSERT->bind_param("ssss", $nom, $prenom, $email, $password_hash);
        $INSERT->bind_param("ssss", $_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $password_hash);
    
        
    
        $success = $INSERT->execute();
    
        if ($success) {
            $_SESSION['user_email'] = $_POST['Email'];
             header('Location: role.php');
            exit();
        } else {
            header('Location: signup.php');
            exit();
            error_log('Échec : ' . $cnx->error);
            
        }
    
        // Fermez la requête préparée
        $INSERT->close();
    
    
}
else {
   $Error= "* Deja Fait Creer ";
}
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SIGN UP</title>
    <style>
          body{
    background-image: url(../img/pexels-alina-vilchenko-1365772.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
    </style>
</head>
<body >
  <section class=" container  bg-white border border-primary p-2" style="width:40%;margin:100px auto">


<form class="text-center p-5" action="signup.php" method="POST">

<p class="h4 mb-4 w-75 mx-auto  border rounded-pill text-primary border-primary py-2">SIGN UP</p>

<div class="form-row mb-4 d-flex gap-2">
<ion-icon name="person-circle-outline" class="fs-2"></ion-icon>
    <div class="col">
        <input type="text" id="FirstName" class="form-control" placeholder="First name" name="FirstName" required>
    </div>
    <div class="col">
     
        <input type="text" id="LastName" class="form-control" placeholder="Last name" name="LastName" required>
    </div>
</div>
<div></div>
<div class="d-flex gap-2  mb-2">
<ion-icon name="mail-outline" class="fs-2"></ion-icon>
<input type="email" id="Email" class="form-control ms-1" placeholder="E-mail" name="Email" required>
</div>
<span class="text-danger"><?php echo $Error ?></span>
</div>
<div class="d-flex gap-2 mt-4">
<ion-icon name="lock-closed-outline" class="fs-2"></ion-icon>
<input type="password" id="Password" class="form-control ms-1" placeholder="Password" name="Password" required>
</div>

<!-- Sign up button -->
<button class="btn btn-info w-75 my-3 btn-block ms-5  fs-4 fw-bold" type="submit" name="send" >Sign in</button>

<p>
        <a href="login.php" target="">Already planning to create?</a>
    </p>
</form>
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>