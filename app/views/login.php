
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/app/public/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div style="text-align: center;">
    <form action="/login" method="post">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите Ваш никнейм" style="text-align: center">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль" style="text-align: center">
        <input type="hidden" name="submit">
        <button type="submit" class="register-btn">Войти</button>
    </form>
    </div>

</body>
</html>