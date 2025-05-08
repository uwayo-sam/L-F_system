<?php
 session_start();
 
 include "../backend/auth.php";


 isAdmin();


?>
<!DOCTYPE html>
<html>
<head>
    <title>L&F system</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body{
            background: linear-gradient(rgba(0,0,0,.7)), url('../public/bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            color: #F5F5F5;
            width: 100vw;
            height: 100vh;
            padding: 0px;
            margin: 0px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <!-- main content -->

     <div class="mt-[5rem] flex flex-col gap-3 items-center  max-lg:mt-[30rem] max-lg:items-center">
        <div>
            <form action="search.php" method="get" class="max-lg:w-[100%] flex gap-0 h-[40px] px-2 py-1 border-2 border-[#ffffff] rounded-lg items-centers">
            <input type="text" name="query" placeholder="search here ..." class="w-[30vw] outline-none px-8 border-none caption-bottom">
            <button type="submit"><i class="fa-solid fa-magnifying-glass cursor-pointer"></i></button>
            </form>
            
        </div>


        <div class="flex flex-col gap-4 items-center max-lg:w-[80%] w-[70%] mt-7">
         <h1 class="text-4xl md:text-5xl font-bold text-center mb-8 max-w-4xl">WELCOME TO LOST & FOUND HUB – YOUR LOST ITEM’S NEW HOPE!</h1>

          <p class="text-lg font-medium text-center max-w-4xl mb-16">Have you lost something important and want to find it? Or found something that 
            doesn’t belong to you and want to return it? You’re in the right place! Lost & Found Hub is where you can report found items or search for things you’ve lost. Whether it’s keys, phones, jewelry, 
            or something special, our community is here to help. Turn worry into hope—let’s bring lost items back to their owners!</p>
        </div>


        <div class="flex gap-2 justify-between w-[70%] mt-10">
            <button class="uppercase hover:bg-transparent hover:cursor-pointer hover:border-2 hover:border-[#949391] font-bold text-sm bg-[#1d2024] px-4 py-1 border-[#D4AF37] border-solid rounded-lg">
                <a href="search.php">search</a>
            </button>

            <button class="uppercase hover:bg-transparent hover:cursor-pointer hover:border-2 hover:border-[#949391]  border-1 font-bold text-sm bg-[#1d2024] px-4 py-1 border-[#949391] border-solid rounded-lg">
                <a href="post.php">post</a>
            </button>
        </div>
     </div>

    <!-- /main content -->
  
</body>
</html>