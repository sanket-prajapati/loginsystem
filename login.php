<?php
session_start();
include 'partial/_dbconnect.php';
$loginErr=false;
// $username=$password=$sql="";

if(isset($_POST['login'])){
  $username=$_POST["username"];
  $password=$_POST['password'];
  // $sql=$conn->prepare("SELECT*FROM user0209 WHERE username=:username");
  // $sql->bindparam("username",$username, PDO::PARAM_STR);
  /* bindParam is a PHP inbuilt function used to bind a parameter to the specified variable name in a sql statement for access the database record*/
  // $sql->execute();
  // $result=$sql->fetch(PDO::FETCH_ASSOC);
  $sql = "select * from user0209 where1 username = '$username' AND password = '$password'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active=$row['active'];

  $count=mysqli_num_rows($result);

//   if(!$result){
//     echo $loginErr=true;
//   }
//   else{
//     if(password_verify($password,$result['password'])){
//       $_SESSION['user_id']=$result['id'];
//       echo "<p>You are sucessfully login </P>";
//       header('location:login.php');
//     }
//     else{
//       echo $loginErr=true;
//     }
//   }
//   if(!isset($_SESSION['user_id'])){
//     header('location:login.php');
//     exit;
//   }
//   else{
//     //show page to user
//     header('location:index.php');
//   }
// }


if($count == 1) {
  session_register("username");
  $_SESSION['login_user'] = $username;
  
  header("location: php/loginsystem/index.php");
}else {
  $error = "Your Login Name or Password is invalid";
}
}
if(isset($_POST['crt_account'])){
  header("location:php/loginsystem/signup.php");
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
    <link rel="stylesheet" href="style.css">

    <title>Login Now</title>
  </head>
  <body>
    <?php require 'partial/_nav.php' ?>
    <h1 class="text-center">Login Now</h1>
    <?php
    if($loginErr==true){
      echo "<p>Username and password combination is worng</p>";
    }
    ?>
  <form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <!-- <div class=""> -->
      <div class="mb-3 col-md-5">
        <label for="username" class="form-label">Username</label>
        <input type="username" name="username"class="form-control" id="username" placeholder="Enter your username">
      </div>
      <div class="mb-3 col-md-5">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
      </div>
    <!-- </div> -->
    <!-- <div class=log-btn> -->
    <button type="submit" name="login" class="btn btn-primary mb-3">Login</button>
    <div class="form-text">If you have not account then</div>
    <button type="submit" name="Crt_account" class="btn btn-primary mb-2">Create Account</button>
    <!-- </div> -->
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