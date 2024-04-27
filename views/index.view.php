


<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $heading?></title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1740fbf071.js" crossorigin="anonymous"></script>
</head>
<body class="min-h-screen w-full h-auto m-auto bg-[#1A2C38]">
    <?php
    require base_path('views/components/navbar.php');
    ?>

    <div class="flex justify-center mt-20">
        <div class="w-3/4 m-auto">

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:grid-cols-5">
                <div class="bg-[#213744] rounded-2xl p-4 text-white text-gray-100 font-semibold text-2xl flex flex-col items-center justify-center shadow-lg">
                    <span>Dice</span>
                    <i class="fa-solid fa-dice mt-2 text-6xl mt-6 text-gray-100"></i>
                    <p class="text-center text-sm mt-6 text-gray-200">Roll the dice and guess the outcome! Top game today!</p>
                    <a href="/games?id=1" class="w-full text-white bg-[#1475E1] mt-10 focus:bg-[#0C69D1] font-medium rounded-lg text-sm px-5 py-2.5 text-center">Play <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="bg-[#213744] rounded-2xl p-4 text-white text-gray-100 font-semibold text-2xl flex flex-col items-center justify-center shadow-lg">
                    <span>Mines</span>
                    <i class="fa-solid fa-bomb mt-2 text-6xl mt-6 text-gray-100"></i>
                    <p class="text-center text-sm mt-6 text-gray-200">Find the correct tiles but watch out for the mines!</p>
                    <a href="/games?id=2" class="w-full text-white bg-[#1475E1] mt-10 focus:bg-[#0C69D1] font-medium rounded-lg text-sm px-5 py-2.5 text-center">Play <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="bg-[#213744] rounded-2xl p-4 text-white text-gray-100 font-semibold text-2xl flex flex-col items-center justify-center shadow-lg">
                    <span>Coming soon...</span>
                    <i class="fa-solid fa-x mt-2 text-6xl mt-6 text-gray-100"></i>
                    <p class="text-center text-sm mt-6 text-gray-200">This item is in the making! <br> Coming soon...</p>
                    <button class="w-full text-white bg-[#0B294A] mt-10 focus:bg-[#0C69D1] disabled font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="bg-[#213744] rounded-2xl p-4 text-white text-gray-100 font-semibold text-2xl flex flex-col items-center justify-center shadow-lg">
                    <span>Coming soon...</span>
                    <i class="fa-solid fa-x mt-2 text-6xl mt-6 text-gray-100"></i>
                    <p class="text-center text-sm mt-6 text-gray-200">This item is in the making! <br> Coming soon...</p>
                    <button class="w-full text-white bg-[#0B294A] mt-10 focus:bg-[#0C69D1] disabled font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="bg-[#213744] rounded-2xl p-4 text-white text-gray-100 font-semibold text-2xl flex flex-col items-center justify-center shadow-lg">
                    <span>Coming soon...</span>
                    <i class="fa-solid fa-x mt-2 text-6xl mt-6 text-gray-100"></i>
                    <p class="text-center text-sm mt-6 text-gray-200">This item is in the making! <br> Coming soon...</p>
                    <button class="w-full text-white bg-[#0B294A] mt-10 focus:bg-[#0C69D1] disabled font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="bg-[#213744] rounded-2xl p-4 text-white text-gray-100 font-semibold text-2xl flex flex-col items-center justify-center shadow-lg">
                    <span>Coming soon...</span>
                    <i class="fa-solid fa-x mt-2 text-6xl mt-6 text-gray-100"></i>
                    <p class="text-center text-sm mt-6 text-gray-200">This item is in the making! <br> Coming soon...</p>
                    <button class="w-full text-white bg-[#0B294A] mt-10 focus:bg-[#0C69D1] disabled font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="bg-[#213744] rounded-2xl p-4 text-white text-gray-100 font-semibold text-2xl flex flex-col items-center justify-center shadow-lg">
                    <span>Coming soon...</span>
                    <i class="fa-solid fa-x mt-2 text-6xl mt-6 text-gray-100"></i>
                    <p class="text-center text-sm mt-6 text-gray-200">This item is in the making! <br> Coming soon...</p>
                    <button class="w-full text-white bg-[#0B294A] mt-10 focus:bg-[#0C69D1] disabled font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
