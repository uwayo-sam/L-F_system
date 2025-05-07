<?php
session_start();


include "../../backend/db/conn.php";
include "../../backend/db/User.php";
include "../../backend/utils.php";

$email;
$password;
if(isset($_POST["email"]) && isset($_POST["password"]) ){
  $email = $_POST["email"];
  $password = $_POST["password"];

  $user = User::FindByEmail($email,$conn);
  if($user && $user["password"]==$password){
    $_SESSION["id"] = $user["id"];
    $_SESSION["name"] = $user["name"];
    $_SESSION["email"] = $user["email"];
    redirect("../../views");
  }else{
    redirect("../../views/auth/signin.php");
  }


}


