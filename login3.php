<?php
session_start();
$login = false;
$showError = false;
$m_account_msg=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partial/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "SELECT * FROM users WHERE `username`='$username' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo $num;//If user created more than one account with same username and password then it will not allow to go inside index.php,therfore $num should be 1.
    // $rows=mysqli_fetch_assoc($result);
    // echo password_verify($password, $rows['password']);
    if ($num==1){
        $login=true;
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php");
    }
    elseif($num>1){
        $m_account_msg="You have more than one account";
    } 
    else{
            $showError = "Invalid Credentials";
    }

    if(isset($_POST['crt_account'])){
        header('location:signup.php');
        exit;
    }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login Now</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php require 'partial/_nav.php' ?>
    <div class="container my-6">
      <h1 class="text-center">Login to Our website</h1>
    </div>
    <?php
    if($login==true){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
        if($showError==true){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
        if($m_account_msg==true){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $m_account_msg.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }

    ?>
    <?php // include 'validation.php'?>
    <form class="form-group" action="login3.php" method="post">
     <div class="mb-3 col-md-5 self_css" >
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
     </div>
     <div class="mb-3 col-md-5">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
     </div>
        <button type="submit" name="login" class="btn btn-primary mb-3">login</button>
        <button type="submit" name="crt_account" class="btn btn-primary mb-3">Create Account</button>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>