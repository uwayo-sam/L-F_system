<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background: #07060e;
            background-repeat: no-repeat;
            background-size: cover;
            color: #F5F5F5;
            width: 100vw;
            height: 100vh;
            background-attachment: fixed;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="w-[100vw] h-[100vh] flex justify-between">
        <img src="../../public/image4.png" width="45%" height="100%" class="rounded-r-3xl shadow-sm shadow-gray-400" alt="">
        <form action="../../backend/controllers/signup.php" method="post" class="w-[35vw] rounded-2xl mr-[130px] mt-[170px] flex px-9 flex-col gap-4 items-center border-2 border-gray-50 h-3/5 justify-center ">
            <h1 class="text-3xl font-bold mb-4 text-white">Sign Up</h1>
            
            <div class="relative w-[30vw]">
                <i class="fas fa-user absolute left-4 top-3 text-gray-400"></i>
                <input class="outline-none px-11 py-2 rounded-full text-lg w-full h-11 border-gray-50 border-2 border-solid bg-transparent text-white placeholder-gray-400 focus:border-gray-500 transition-all" 
                       type="text" 
                       name="name" 
                       placeholder="Enter Your Name" 
                       id=""
                       required>
            </div>
            
            <div class="relative w-[30vw]">
                <i class="fas fa-envelope absolute left-4 top-3 text-gray-400"></i>
                <input class="outline-none px-11 py-2 rounded-full text-lg w-full h-11 border-gray-50 border-2 border-solid bg-transparent text-white placeholder-gray-400 focus:border-gray-500 transition-all" 
                       type="email" 
                       name="email" 
                       placeholder="Enter Your Email" 
                       id="" required>
            </div>
            
            <div class="relative w-[30vw]">
                <i class="fas fa-lock absolute left-4 top-3 text-gray-400"></i>
                <input class="outline-none px-11 py-2 rounded-full text-lg w-full h-11 border-gray-50 border-2 border-solid bg-transparent text-white placeholder-gray-400 focus:border-gray-500 transition-all" 
                       type="password" 
                       name="password" 
                       placeholder="Enter Your Password" 
                       id="" required>
            </div>
            
            <button type="submit" class="mt-4 w-[30vw] bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-full transition-colors duration-200">
                Sign Up
            </button>
            <div class="flex flex-col gap-1 items-center">
                <h1 class="font-bold">OR</h1>
                
                <p>if you already have an acount <a href="signin" class=" underline text-gray-400 font-bold">sign in</a></p>
            </div>
           
        </form>
    </div>
</body>
</html>