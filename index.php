<?php
session_start();
spl_autoload_register('autoLoaderControllers', false);
spl_autoload_register('autoLoaderModels');


function autoLoaderControllers(string $className)
{
    if (file_exists(__DIR__ . '/app/controllers/' . str_replace('\\', '/', $className) . '.php'))
        require __DIR__ . '/app/controllers/' . str_replace('\\', '/', $className) . '.php';
}

function autoLoaderModels(string $className)
{
    if (file_exists(__DIR__ . '/app/models/' . str_replace('\\', '/', $className) . '.php'))
        require __DIR__ . '/app/models/' . str_replace('\\', '/', $className) . '.php';
}

$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/app/conf/routes.php';

$isRouteExist = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteExist = true;
        break;
    }
}

if (!$isRouteExist) {
    echo 'Страница не найдена!';
    return;
}
unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);
