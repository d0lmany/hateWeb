<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>
<body class="text-slate-50 bg-slate-900 accent-pink-500">
    <? include "connect.php"; sethead();
    if(isset($_GET["send"])) echo $_GET["send"] ?>
    <main class="m-5 flex">
            <section class="w-1/2 m-1">
        <h3 class="text-lg text-center">Товары</h3>
    <table class="border-separate border border-slate-500 border-spacing-1 w-full">
    <tr class="bg-cyan-950 border border-slate-500">
        <th>Товар</th>
        <th>ID Категории</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Годен до</th>
    </tr>
    <? showtab("products") ?>
    </table>
    </section>
    <section class="w-1/2 m-1">
        <h3 class="text-lg text-center">Категории</h3>
    <table class="border-separate border border-slate-500 border-spacing-1 w-full">
        <tr class="bg-cyan-950 border border-slate-500">
            <th>Категория</th>
        </tr>
        <? showtab("categories") ?>
    </table>
    </section>
    </main>
</body>
</html>