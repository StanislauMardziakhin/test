<?php


class UsersController
{
    public function register()
    {

        if (isset($_POST['submit'])) {
            // Если форма отправлена, получаем данные
            $login = htmlspecialchars($_POST['login']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password_confirm = htmlspecialchars($_POST['password_confirm']);
            $name = htmlspecialchars($_POST['name']);

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkLogin($login)) {

                $errors[] = 'Логин должен состоять минимум из 6 символов';
            }
            if (User::checkLoginExists($login)) {
                $errors[] = 'Такой логин уже существует';
            }
           if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен состоять минимум из 6 символов и содержать в себе цифры и буквы';
            }
           if (!User::passwordConfirm($password, $password_confirm)) {
                $errors[] = 'Введенные пароли не совпадают';
                       }
           if (!User::checkEmail($email)) {
                $errors[] = 'Пожалуйста, введите корректный e-mail';
                      }
           if (User::checkEmailExists($email)) {
                $errors[] = 'Указанный e-mail уже используется';
                      }
           if (!User::checkName($name)) {
                $errors[] = 'Имя должно состоять минимум из двух символов и содержать только буквы';
                      }

            if ($errors == false) {
                User::registration($login, $password, $password_confirm, $email, $name);
            }
        }

        include_once __DIR__ . '/../views/register.php';

    }
    public function login()
    {

        if (isset($_POST['submit'])) {
            // данные из формы
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            // Валидация
            if (!User::checkLogin($login)) {
                $errors[] = 'Логин должен состоять минимум из 6 символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен состоять минимум из 6 символов и содержать в себе цифры и буквы';
            }

           $userLogin = User::checkUser($login, $password);

            if ($userLogin == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userLogin);

                // Тут надо будет перенаправить пользователя на главную с текстом "привет, юзернейм"

            }
        }

        include_once __DIR__ . '/../views/login.php';
    }
    public function logout()
    {
        //ЗДЕСЬ БУДЕТ ВЫХОД
        {
            // Стартуем сессию
            session_start();

            // Удаляем информацию о пользователе из сессии
            unset($_SESSION["user"]);

            // Перенаправляем пользователя на главную страницу
            header("Location: /login");
        }

    }
}