
<div class="h-16 w-full shadow-lg flex items-center justify-center">
    <div class="w-3/4 flex items-center">
        <div class="flex-auto flex justify-between items-center text-white">
                <div>
                    <a href="/" class="font-bold text-xl">Drinko</a>
                </div>
            <div class="flex items-center">
                <div class="relative flex-grow">
                    <div class="dropdown dropdown-bottom dropdown-end rounded-tr-none ">
                        <div tabindex="0" role="button" class="btn m-1 bg-[#0F212E] border-0 mr-0 text-white hover:bg-[#0E1F2C] rounded-br-none rounded-tr-none ">
                            <?php if ($user): ?>
                                <p>$<?= $user->balance?> <i class="fa-brands fa-ethereum"></i></p><i class="fa-solid fa-caret-down"></i>
                                <ul tabindex="0" class="dropdown-content z-[1] bg-[#0F212E] menu p-2 shadow-lg rounded-box w-52">
                                    <li><button>Bitcoin <i class="fa-brands fa-bitcoin"></i></button></li>
                                    <li><a>Ehterium <i class="fa-brands fa-ethereum"></i></a></li>
                                </ul>
                            <?php else: ?>
                                <a href="/login">Sign In</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <a href="/wallet" class="bg-[#1475E1] px-4 py-3 rounded-md ml-0 font-semibold rounded-bl-none rounded-tl-none">Wallet</a>
            </div>



            <div>
                    <?php if ($user): ?>
                        <div class="flex gap-2 font-semibold">
                            <p class="px-2 py-2 cursor-pointer">Search<i class="ml-1 fa-solid fa-magnifying-glass"></i></p>
                            <a href="/profile" class="px-2 py-2"><i class=" fa-solid fa-user"></i></a>
                            <a href="/logout" class="px-2 py-2">Logout</a>
                        </div>
                    <?php else: ?>
                        <div class="flex gap-2 font-semibold">
                            <a href="/login" class="px-4 py-3">Sign In</a>
                            <a href="/register" class="bg-[#1475E1] px-4 py-3 rounded-md ml-0 font-semibold">Regsiter</a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>


