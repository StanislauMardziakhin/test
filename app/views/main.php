<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <link rel="stylesheet" href="/app/public/css/main.css">
</head>

<body>

<h1>ГЛАВНАЯ СТРАНИЦА</h1>

    <div>
        <?php if (User::isGuest()): ?>
        <a href="/register">Регистрация</a>

                <a href="/login">Вход</a>
        <?php else: ?>
        <a href="/logout">Выход</a>
        <?php endif; ?>

    </div>





</body>

</html>
