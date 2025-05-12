<?php
session_start();
include "../backend/db/item.php";
include "../backend/db/conn.php";
include "../backend/auth.php";


isAuth();
isAdmin();


$item;

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $item = Item::Find($_GET['id'],$conn)[0];
    if(!$item){
      redirect('./');
    }

    $_SESSION['I_id'] = $_GET['id'];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reports</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background: linear-gradient(rgba(0,0,0,.7)), url('../public/bg.png');
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
     <div class="flex justify-center items-center">

     <form action="../backend/controllers/report.php" method="post" class="backdrop-blur-sm w-[35vw] rounded-2xl flex px-9 flex-col gap-4 items-center border-2 border-gray-50 justify-center mt-7 h-[85vh]" enctype="multipart/form-data">
            <h1 class="text-3xl font-bold mb-4 text-white">Report you info</h1>

            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="location" placeholder="Enter Where Your Lost It" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>

            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="time" placeholder="Enter Time Your Lost It" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="phone" placeholder="Enter your phone" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
           
            <div class="w-3/4 h-[100px] flex border-solid border-2 border-gray-400 rounded-lg  py-2 items-center justify-start">
                <textarea name="description"  placeholder="Enter Your Item description" class="px-5 h-full w-full rounded-lg overflow-hiddens outline-none text-lg" required></textarea>
            </div>
        
            <button type="submit" class="mt-4 px-4 w-[30vw] bg-gray-800 hover:bg-gray-700 text-white font-medium py-2 rounded-full transition-colors duration-200">
               send
            </button>
            
        </form>
     </div>

    
</body>
</html>