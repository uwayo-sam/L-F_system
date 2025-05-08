<?php
require "utils.php";

function isAuth(){
   if(!isset($_SESSION['id']) && !isset($_SESSION['name']) && !isset($_SESSION['email'])){
     redirect('../views/auth/signin');
   }


}



function isAdmin(){
  if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
       redirect('../views/admin');
  }
}