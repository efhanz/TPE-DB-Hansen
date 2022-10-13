<?php
require_once "Controller/SaleController.php";

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

$saleController = new SaleController();

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $saleController->showHome();
        break;
    case 'showSales':
        $saleController->getSales();
        break;
    case 'saleDetail':
        $saleController->getSale($params[1]);
        break;
    case 'createSale':
        $saleController->createSale();
        break;
    case 'deleteSale':
        $saleController->deleteSale($params[1]);
        break;
    case 'updateSale':
        $saleController->updateSale($params[1]);
        break;
    default:
        echo ('404 Page not found');
        break;
}

?>

