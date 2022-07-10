<?php
    
    // $validaton=false;
    $username=$password=$cpassword="";
    $usernameErr=$passwordErr=$cpasswordErr="";
    
    
    // if(isset($_POST['reg_submit']) ){
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty($_POST["username"])){
        $usernameErr="Username not should be blank";
    }
    else{
    $username=test_input($_POST["username"]);
     if (!preg_match("/^()%#!*$/",$username)) {
        $usernameErr = "Only letters and white space allowed";
        // $validation=true;
     }
      else{
        $validation=true;
    }
    }
    if(empty($_POST["password"])){
        $passwordErr="Password not should be blank";
    }
    else{
        $password=test_input($_POST["password"]);
        $validation=true;
    }
    
    if(empty($_POST["cpassword"])){
        $cpasswordErr="Confirm password should not be blank";
    }
    else{
        $cpassword=test_input($_POST["cpassword"]);
        $validation=true;
    }
}

// function test_input($data){
//     $data=trim($data);
//     $data=stripslashes($data);
//     $data=htmlspecialchars($data);
//     return $data;
// }

// }
?>