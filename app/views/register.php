<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
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
    <form action="/register" method="post">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите Ваш никнейм" style="text-align: center" value="<?php echo $login; ?>">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль" style="text-align: center">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Повторите пароль" style="text-align: center">
        <label>E-mail</label>
        <input type="email" name="email" placeholder="Введите свой e-mail" style="text-align: center" value="<?php echo $email; ?>">
        <label>Имя</label>
        <input type="text" name="name" placeholder="Введите Ваше имя" style="text-align: center" value="<?php echo $name; ?>">
        <input type="hidden" name="submit">
        <button type="submit" class="register-btn">Зарегистрироваться</button>
        <p>
            Уже зарегистрированы? - <a href="/login">Войти</a>
        </p>
    </form>
    </div>

</body>
</html>