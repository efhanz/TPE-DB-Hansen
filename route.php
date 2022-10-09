<?php
require_once "db.php";
require_once "tasks.php";


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {  //si viene definina la reemplazamos
    $action = $_GET['action'];
}
else {
    $action = 'home'; //accion por defecto si no seleccionan nada
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode ('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        showHome();
        break;
    case 'createTask':
        createTask();
        break;
    case 'deleteTask':
        deleteTask($params[1]);
        break;
    case 'updateTask':
        updateTask($params[1]);
        break;
    case 'getTask':
        getTask($params[1]);
        break;
    default:
        echo ('404 Page not found');
        break;
}

?>

