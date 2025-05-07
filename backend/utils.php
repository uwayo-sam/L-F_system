<?php

function redirect($url) {
    header("Location: $url");
}

function logout() {
    if(isset($_SESSION["email"]) && isset($_SESSION["name"]) && isset($_SESSION["id"])){

       session_destroy();
       
    }
}
