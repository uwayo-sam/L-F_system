<?php
require "utils.php";

function isAuth(){
   if(!isset($_SESSION['id']) && !isset($_SESSION['name']) && !isset($_SESSION['email'])){
     redirect('../views/auth/signin.php');
   }


}