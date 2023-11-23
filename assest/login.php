<?php
session_start();
include 'cnx.php';
$email = "";
$password = "";
// $Error= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$email = $_POST["email"];
$password=$_POST['password'];
// echo $email;
$q = "SELECT * FROM utlisateur WHERE email = '$email'";
$q = $cnx->prepare("SELECT * FROM utlisateur WHERE email = ?");
$q->bind_param("s", $email);
$q->execute();
$result = $q->get_result();
if($result->num_rows > 0 ) {
          $data=$result->fetch_assoc();
          if($data){
            $hash=$data['password'];
            if(password_verify($password,$hash)){
                if ($data["idRole"] == 1) {
                    $_SESSION['prenom_admin']=$data['prenom'];
                    $_SESSION['nom']=$data['nom'];
                    header("location: dashbord.php");
                    exit;
                  }else{
                    header("location: client.php");
                    exit;
                  }
            }
          }
   
  
    
}
else if($result->num_rows==0) {
    echo 'ERROR';

}


}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<section  class=" container  bg-white border border-primary p-2" style="width:40%;margin:100px auto">
<form class="text-center border container w-75 border-light p-5" action="login.php" method="post">

    <p class="h4 mb-4">Login</p>
    <!-- Name -->
    <input type="email" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="email" placeholder="Email" required>

    <!-- Email -->
    <input type="password" id="defaultSubscriptionFormEmail" class="form-control mb-4" name="password" placeholder="Password" required>

    <!-- Sign in button -->
    <button class="btn btn-info w-75 mb-3 btn-block" type="submit">Sign in</button>
    <p>
        <a href="signup.php">SIGN UP?</a>
    </p>

</form>
</section>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</body>
</html>