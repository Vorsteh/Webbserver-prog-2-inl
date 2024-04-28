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

<div class="relative overflow-x-auto sm:rounded-lg">
    <table class="w-3/4 mt-20 m-auto text-sm text-left rtl:text-right text-gray-100">
        <thead class="text-xs text-gray-100 uppercase bg-[#0F212E]">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>
                <th scope="col" class="px-6 py-3">
                    Timestamp
                </th>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
            </tr>
            </thead>
        <tbody>
        <?php foreach ($transactions as $transaction): ?>
            <tr class="odd:bg-[#1A2C38] even:bg-[#0F212E] border-b border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-200 whitespace-nowrap dark:text-white">
                    $<?= $transaction['amount'] ?>
                </th>
                <td class="px-6 py-4">
                    <?= $transaction['created_at'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $transaction['type'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
