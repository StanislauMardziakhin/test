<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <link rel="stylesheet" href="/app/public/css/main.css">
</head>

<body>

<h1>ГЛАВНАЯ СТРАНИЦА</h1><br>

    <div>
        <a href="/register">Регистрация</a>
        <a href="/login">Вход</a>
        <?php if (!empty($_SESSION['user'])): ?>
        <a href="/logout">Выход</a>
        <?php endif; ?>
    </div>





</body>

</html>
