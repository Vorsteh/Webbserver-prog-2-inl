
<div class="h-16 w-full shadow-lg flex items-center justify-center z-60">
    <div class="w-3/4 flex items-center">
        <div class="flex-auto flex justify-between items-center text-white">
                <div>
                    <a href="/" class="font-bold text-xl">Drinko</a>
                </div>
            <div class="flex items-center">
                <div class="relative flex-grow">
                    <div class="dropdown dropdown-bottom dropdown-end rounded-tr-none">
                        <div tabindex="0" id="dcurr" role="button" class="btn m-1 bg-[#0F212E] border-0 mr-0 text-white hover:bg-[#0E1F2C] rounded-br-none rounded-tr-none ">
                            <?php if ($user): ?>
                                <p>$<?= number_format($user->balance, 2)?> <i id="currency" class="fa-brands fa-ethereum"></i></p><i class="fa-solid fa-caret-down"></i>
                                <ul tabindex="0" class="dropdown-content z-[1] bg-[#0F212E] menu p-2 shadow-lg rounded-box w-52">
                                    <li><button id="btc">Bitcoin <i class="fa-brands fa-bitcoin"></i></button></li>
                                    <li><button id="eth">Ehterium <i class="fa-brands fa-ethereum"></i></button></li>
                                </ul>
                            <?php else: ?>
                                <a href="/login">Sign In</a>
                            <?php endif; ?>
                        </div>
                        <div id="converted" class="absolute top-full left-0 mt-2 py-1 px-2 bg-[#0F212E] shadow-md rounded-md z-10 text-sm hidden font-semibold"></div>
                        <div class="hidden" id="hiddenUserMoney"><?php echo $user->balance?></div>
                    </div>
                </div>
                <a href="/wallet" class="bg-[#1475E1] px-4 py-3 rounded-md ml-0 font-semibold rounded-bl-none rounded-tl-none">Wallet</a>
            </div>



            <div>
                    <?php if ($user): ?>
                        <div class="flex gap-2 font-semibold">
                            <p class="px-2 py-2 cursor-pointer"><i class="ml-1 fa-solid fa-magnifying-glass text-sm"></i>⠀Search</p>
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

<script>
    const btcButton = document.getElementById('btc');
    const ethButton  = document.getElementById('eth');
    const currency = document.getElementById('currency');

    const converted = document.getElementById('converted');
    const userMoney = document.getElementById('dcurr');

    currency.className = localStorage.getItem('currency') ? localStorage.getItem('currency') : 'fa-brands fa-ethereum';

    btcButton.addEventListener('click', function(){
        let b = 'fa-brands fa-bitcoin';
        localStorage.setItem('currency' ,b)
       currency.className = 'fa-brands fa-bitcoin';
    });
    ethButton.addEventListener('click', function(){
        let b = 'fa-brands fa-ethereum';
        localStorage.setItem('currency' ,b)
        currency.className = 'fa-brands fa-ethereum';
    });

    userMoney.addEventListener('mouseenter', function () {
        const currency = localStorage.getItem('currency');
        const hiddenUserMoneyValue = parseFloat(document.getElementById('hiddenUserMoney').innerText);

        converted.classList.remove('hidden');
        const btcToUSD = 63422;
        const ethToUSD = 3253;
        const btcIcon = '<i class="fa-brands fa-bitcoin"></i>';
        const ethIcon = '<i class="fa-brands fa-ethereum"></i>';
        let type = '';

        let convertedValue;
        let iconHTML;
        if (currency === 'fa-brands fa-bitcoin') {
            convertedValue = hiddenUserMoneyValue / btcToUSD;
            type = btcIcon;
        } else if (currency === 'fa-brands fa-ethereum') {
            convertedValue = hiddenUserMoneyValue / ethToUSD;
            type = ethIcon;
        } else {
            console.error('Unsupported currency:', currency);
            return;
        }

        console.log(type);
        converted.innerHTML = convertedValue.toFixed(5) + type;
    });


    userMoney.addEventListener('mouseleave', function (){
        converted.classList.add('hidden');
    });
</script>


