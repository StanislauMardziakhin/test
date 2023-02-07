<?php
return [
    '~^$~' => [MainController::class, 'main'],
    '~^register$~' => [UsersController::class, 'register'],
    '~^login$~' => [UsersController::class, 'login'],
    '~^logout$~' => [UsersController::class, 'logout'],
];

