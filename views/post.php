<?php
session_start();
include "../backend/auth.php";

isAuth();
isAdmin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L&F | post item</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* *{
            padding: 0;
            margin: 0;
        } */
        body{
            background: linear-gradient(rgba(0,0,0,.7)), url('../public/bg2.png');
            background-repeat: no-repeat;
            background-size: cover;
            color: #F5F5F5;
            width: 100vw;
            height: 100vh;
          
        }

       

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
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

     <form action="../backend/controllers/post.php" method="post" class="backdrop-blur-sm w-[35vw] rounded-2xl flex px-9 flex-col gap-4 items-center border-2 border-gray-50 justify-center mt-7 h-[85vh]" enctype="multipart/form-data">
            <h1 class="text-3xl font-bold mb-4 text-white">Post Item</h1>

            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="name" placeholder="Enter Item Name" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="location_found" placeholder="Enter Where you Are" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="contact_info" placeholder="Enter Phone Number" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="type" placeholder="Enter Item Type" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
            <div class="w-3/4 h-[100px] flex border-solid border-2 border-gray-400 rounded-lg  py-2 items-center justify-start">
                <textarea name="description"  placeholder="Enter Item Name" class="px-5 h-full w-full rounded-lg overflow-hiddens outline-none text-lg" required></textarea>
            </div>
            
                <input type="file" name="file" accept="image/*" placeholder="Select Item Image" class="px-3 py-2 bg-[#0c0b12] hover:cursor-pointer hover:bg-slate-900 rounded-md" required>
        
            <button type="submit" class="mt-4 px-4 w-[30vw] bg-gray-800 hover:bg-gray-700 text-white font-medium py-2 rounded-full transition-colors duration-200">
               Post
            </button>
            
        </form>
     </div>

    
</body>
</html>