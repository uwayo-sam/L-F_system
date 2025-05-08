<?php
session_start();


include "../../backend/db/conn.php";
include "../../backend/db/User.php";
include "../../backend/utils.php";

$email;
$password;
$name;

if(isset($_POST["email"])  && isset($_POST["email"])  && isset($_POST["password"]) &&  !empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["password"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $name = $_POST["name"];

  $user = User::FindByEmail($email,$conn);
  if($user){
    redirect("../../views/auth/signin.php");
  }else{
    if(User::Create($name,$email,$password,$conn)){
        
        $user = User::FindByEmail($email,$conn);
        if($user && $user["password"]==$password){
            $_SESSION["id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];
            redirect("../../views");
    }
  }
}
}