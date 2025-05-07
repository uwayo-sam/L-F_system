<?php

session_start();
include "../backend/db/item.php";
include "../backend/db/conn.php";
include "../backend/auth.php";


isAuth();
$item;

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $item = Item::Find($_GET['id'],$conn)[0];
    if(!$item){
      redirect('./');
    }
}
if(isset($_GET['action'])){
  Item::SetStatus($_GET['id'],$conn);
  redirect('./search');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>item detail</title>
    
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background: linear-gradient(rgba(0,0,0,.7)), url('../public/bg3.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: #F5F5F5;
            width: 100vw;
            height: 100vh;
            padding: 0px;
            margin: 0px;
        }   
    </style>
</head>
<body>
    <!-- header -->
    <div class="w-[100vw] flex justify-between px-5 py-3">
        <div>
        <a href="./"><h1 class="text-2xl font-extrabold uppercase">L&F</h1></a>
        </div>
        <div class="flex gap-2">
            

            <?php
             if ( isset($_SESSION["id"])&& isset($_SESSION["name"])&& isset($_SESSION["email"])){

                echo "
                    <h1 class=text-xl font-bold font-extrabold uppercase'>".$_SESSION["name"]."</h1>
                    <button class='hover:bg-transparent hover:cursor-pointer hover:border-2 hover:border-[#919194] capitalize font-bold text-sm bg-[#1d2024] px-4 py-1 border-solid rounded-lg'>
                    <a href='./auth/signout.php'>sign Out</a>
                    </button>
                ";
                // echo $_SESSION["name"];
               
             }else{
                echo '
                 <button class=" hover:bg-transparent hover:cursor-pointer hover:border-2 hover:border-[#919194] capitalize font-bold text-sm bg-[#1d2024] px-4 py-1 border-solid rounded-lg">
                <a href="./auth/signin.php">sign In</a>
            </button>

            <button class=" hover:bg-transparent hover:cursor-pointer hover:border-2 hover:border-[#949391] max-lg:hidden capitalize border-1 font-bold text-sm bg-[#1d2024] px-4 py-1 border-[#949391] border-solid rounded-lg">
                <a href="./auth/signup.php">sign Up</a>
            </button>
                
                ';
             }

            ?>
           
        </div>
    </div>
    <!-- /header -->



    <!-- details section -->

<div class="flex items-center justify-center">
    <div class="w-[50%] h-[70vh] flex items-center gap-7 justify-between backdrop-blur-sm border-2 border-gray-500 rounded-xl">

    <?php
    echo "<img src='../uploads/{$item['image']}' class='w-[50%] h-full shadow-md shadow-gray-600 rounded-xl'>";
    ?>
     
     <div class="flex flex-col gap-2 w-[50%]">
      
     <div class="flex gap-2">
        <h1 >name :</h1>
        <h1 class=" text-xl font-bold"><?php echo $item['name'] ?></h1>
      </div>

      <div class="flex gap-2">
        <h1>location: </h1>
        <h2 class="text-lg font-bold"><?php echo $item['loacation_found'] ?></h2>
       </div>

       <div class="flex gap-2">
        <h1>contact: </h1>
        <h3 class="text-lg font-bold"><?php echo $item['contact_info'] ?></h3>
        </div>

        <div class="flex gap-2">
        <h1>type: </h1>
        <h4 class="text-lg font-bold"><?php echo $item['type'] ?></h4>
        </div>

        <div class="flex gap-2">
        <h1>description: </h1>
        <h4 class="text-md font-bold"><?php echo $item['description'] ?></h4>
        </div>

         <div class="flex gap-2">
         <h1>time: </h1>
         <h5><?php echo $item['created_at'] ?></h5>
        </div>
        <?php

        if($item['status'] == 'pending'){
          echo "<a href='./details?id={$item['id']}&&action=approve' class='backdrop-blur-sm border-2 w-1/2 hover:cursor-pointer hover:bg-gray-600 border-gray-600 px-5 py-2 rounded-xl'>approve</a>";
        }else{
            echo "<h1 class=' font-medium text-lg'>approved</h1>";
        }

        ?>
         
        
    </div>
      </div>


    </div>


    </div>
    <!-- /details section -->
    
</body>
</html>
