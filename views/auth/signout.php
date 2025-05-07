<?php
session_start();

include '../../backend/utils.php';

if( isset($_SESSION["id"])&& isset($_SESSION["name"])&& isset($_SESSION["email"])){
    session_destroy();
    redirect("../");
}