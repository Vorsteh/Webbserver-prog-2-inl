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
        <div class="w-3/4  m-auto text-gray-100 text-5xl">
            <i class="fa-brands fa-paypal"></i>
            <i class="fa-solid fa-credit-card"></i>
            <i class="fa-solid fa-wallet"></i>
        </div>
    </div>
</body>
</html>
