


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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
                    <span>Hilo</span>
                    <svg class="h-[60px] mt-6" viewBox="0 0 213 186" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="106.55" y="34.2043" width="104" height="138.327" rx="15" transform="rotate(-0.623715 106.55 34.2043)" fill="#F3F4F6"/>
                        <rect x="-1.38108" y="56.2705" width="116" height="150.327" rx="21" transform="rotate(-29.4733 -1.38108 56.2705)" fill="#F3F4F6" stroke="#213744" stroke-width="10"/>
                        <g clip-path="url(#clip0_26_14)">
                            <path d="M89.0591 105.711C88.3905 108.958 86.6989 112.041 84.2141 114.541C81.7292 117.041 78.5716 118.836 75.1701 119.684C71.7686 120.532 68.2881 120.391 65.2013 119.28C62.1146 118.168 59.5713 116.141 57.9168 113.473C54.2292 107.525 56.6439 100.729 59.8627 91.6655C62.6695 83.7573 66.0912 74.1213 66.5993 61.83C77.8342 66.8412 87.9866 68.0619 96.3179 69.0649C105.867 70.2125 113.028 71.0723 116.716 77.0205C118.369 79.6889 119.054 82.8684 118.677 86.1273C118.299 89.3862 116.878 92.5664 114.606 95.236C112.334 97.9055 109.321 99.935 105.977 101.049C102.632 102.163 99.1189 102.307 95.9133 101.461C100.114 104.054 104.575 106.286 109.249 108.136C111.025 108.834 111.115 111.333 109.359 112.421L92.8956 122.628C91.1358 123.719 88.9376 122.527 89.1064 120.624C89.5285 115.614 89.5127 110.626 89.0591 105.711Z" fill="#213744"/>
                        </g>
                        <path d="M167.75 52C173.137 52 177.5 56.2243 177.5 61.4354C177.5 56.2243 181.863 52 187.25 52C192.637 52 197 56.2243 197 61.4354C197 69.2894 189.117 72.0598 178.456 84.5617C178.338 84.699 178.192 84.8094 178.027 84.8851C177.862 84.9608 177.682 85 177.5 85C177.318 85 177.138 84.9608 176.973 84.8851C176.808 84.8094 176.662 84.699 176.544 84.5617C165.883 72.0598 158 69.2894 158 61.4354C158 56.2243 162.363 52 167.75 52Z" fill="#213744"/>
                        <defs>
                            <clipPath id="clip0_26_14">
                                <rect width="79.0647" height="69.8978" fill="white" transform="translate(33 82.6601) rotate(-31.797)"/>
                            </clipPath>
                        </defs>
                    </svg>

                    <p class="text-center text-sm mt-6 text-gray-200">Guess if the next card is <br> higher or lower!</p>
                    <a href="/games?id=3" class="w-full text-white bg-[#1475E1] mt-10 focus:bg-[#0C69D1] font-medium rounded-lg text-sm px-5 py-2.5 text-center">Play <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="bg-[#213744] rounded-2xl p-4 text-white text-gray-100 font-semibold text-2xl flex flex-col items-center justify-center shadow-lg">
                    <span>Plinko</span>
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
    <script>
        function shakeWebsite() {
            $('body').addClass('animate__animated animate__shakeX');
            setTimeout(function () {
                $('body').removeClass('animate__animated animate__shakeX');
            }, 1000);
        }

        $(document).ready(function () {
            shakeWebsite();
        });
    </script>
    <style>
        body{
            overflow: hidden;
        }

        .animate__shakeX {
            animation: shakeX 0.5s;
        }

        @keyframes shakeX {
            0% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-20px);
            }
            50% {
                transform: translateX(20px);
            }
            75% {
                transform: translateX(-5px);
            }
            100% {
                transform: translateX(0);
            }
    </style>
</body>
</html>
