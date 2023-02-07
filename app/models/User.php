<?php


class User
{
    public static function registration($login, $password, $password_confirm, $email, $name)
    {
        //соль и хэширование пароля
        $salt = 's4Rn7Vcsq33';
        $password = md5($salt . $_POST['password']);
        $password_confirm = md5($salt . $_POST['password_confirm']);
        $db = file_get_contents(__DIR__ . '/../conf/db.json', true);
        //перевести json строку в массив
        $users_array = json_decode($db, true);
        $user = ['login' => $login, 'email' => $email, 'password' => $password, 'password_confirm' => $password_confirm, 'name' => $name];
        $users_array[] = $user;
        $users_array_row = json_encode($users_array);
        file_put_contents(__DIR__ . '/../conf/db.json', $users_array_row);

    }
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function checkLogin($login)
    {
        if (strlen($login) >= 6) {
            return true;
        }
        return false;

    }
    public static function checkLoginExists($login)
    {
        {
            $db = file_get_contents(__DIR__ . '/../conf/db.json', true);
            $users_array = json_decode($db, true);
            $logins_array = array_column($users_array, 'login');
            if (in_array($login, $logins_array)) {
                return true;
            }
            return false;
        }
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6 && preg_match("/^[ЁА-яA-z0-9](?=.*\d)/", $password)) {
            return true;
        }
        return false;

    }

    public static function passwordConfirm($password, $password_confirm)
    {
        if ($password === $password_confirm) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = file_get_contents(__DIR__ . '/../conf/db.json', true);
        $users_array = json_decode($db, true);
        $emails_array = array_column($users_array, 'email');
        if (in_array($email, $emails_array)) {
            return true;
        }
        return false;
    }
    public static function checkName($name)
    {
        if (strlen($name) >= 2 && ctype_alpha($name)) {
            return true;
        }
        return false;
    }
    public static function checkUser($login, $password)
    {
        {
            $salt = 's4Rn7Vcsq33';
            $password = md5($salt . $_POST['password']);
            $db = file_get_contents(__DIR__ . '/../conf/db.json', true);
            $users_array = json_decode($db, true);
            $logins_array = array_column($users_array, 'login');
            $pass_array = array_column($users_array, 'password');
            if (in_array($login, $logins_array) == $_POST['login'] && (in_array($password, $pass_array) == $_POST['password']))  {
                return true;
            }
            return false;
        }
    }
    public static function auth($userLogin)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userLogin;
    }

}