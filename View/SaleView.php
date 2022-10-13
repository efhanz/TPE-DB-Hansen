<?php

require_once "./libs/smarty-4.2.1/libs/Smarty.class.php";

class SaleView{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showHomev() {
        $this->smarty->assign('titulo', 'BUSINESS INTELLIGENCE');
        $this->smarty->display('templates/home.tpl');

    }
    function showSales($sales) {
        $this->smarty->assign('titulo1', '....');
        $this->smarty->assign('titulo2', 'Daily Sales');
        $this->smarty->assign('sales', $sales);
        $this->smarty->display('templates/salesList.tpl');

    }
    function showHomeLocation(){
        header("Location: ".BASE_URL."showSales"); 
    }

    function showSaleDetail($sale){
        $this->smarty->assign('titulo', 'Detalle de la Venta');
        $this->smarty->assign('sale', $sale);
        $this->smarty->display('templates/saleDetail.tpl');
    }
  
}

