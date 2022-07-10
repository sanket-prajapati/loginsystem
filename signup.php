<?php
$showAlert=false;
$notMatch=false;
$validation=false;

// $usernameErr=false;
  if(isset($_POST['reg_submit']) ){

    function test_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
      }
    
   require_once 'partial/_dbconnect.php';
   include 'validation.php';
   $username=test_input($_POST["username"]);
   $password=test_input($_POST["password"]);
   $cpassword=test_input($_POST["cpassword"]);
   
   if(($password==$cpassword)){
    $sql="INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password');";
    $result= mysqli_query($conn,$sql);
    // include 'validation.php';
    if($result && $validation){
       $showAlert=true;
    }
    else{

    }
   }
   else{
    $notMatch=true;
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

    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php require 'partial/_nav.php' ?>

    <?php
    if($showAlert){
    echo "
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Account created Successfully!</strong> You can login now.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    ?>
    
    <div class="container my-6">
      <h1 class="text-center">Signup to Our website</h1>
    </div>
    <?php include 'validation.php'?>
    <form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
     <div class="mb-3 col-md-5 self_css" >
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        <span class="require">*Required
        <?php
          echo $usernameErr;
        ?></span>
     </div>
     <div class="mb-3 col-md-5">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <span class="require">*Required
        <?php
          echo $passwordErr;
        ?></span>
     </div>
     <div class="mb-3 col-md-5">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password" name="cpassword">
        <div id="passwordhelp" class="form-text">Make Sure input password id is same</div>
        <?php
        if($notMatch){
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Password dose not match!</strong> please reform.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
        }
        ?>
        <span class="require">*Required
        <?php
          echo $cpasswordErr; 
        ?></span>
     </div>
        <button type="submit" name="reg_submit" class="btn btn-primary">SignUp</button>
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