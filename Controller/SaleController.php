<?php
require_once "./Model/SaleModel.php";
require_once "./View/SaleView.php";

class SaleController
{
    private $model;
    private $view;
    
    function __construct()
    {
        $this->model = new SaleModel();
        $this->view = new SaleView();
    }

    function showHome()
    {
        $this->view->showHomev();
    }

    function getSales()
    {
        $sales = $this->model->getSales();
        $this->view->showSales($sales);
    }

    function getSale($id) {
        $sale =  $this->model->getSaleFromDB($id);
        $this->view->showSaleDetail($sale);
        
    }
    
    function createSale(){
        // if (!isset($_POST['done'])){
        //     $done = 0;
        // } else {
        //         $done = 1;
        //     }  
        $this->model->insertSale($_POST['customer'], $_POST['invoice'], $_POST['dates'], $_POST['seller'], $_POST['product'], $_POST['quantity'], $_POST['unitprice'], $_POST['amount']);
        $this->view->showHomeLocation();  
    }

    function deleteSale($id){
        $this->model->deleteSaleFromDB($id); 
        $this->view->showHomeLocation();
    }

    function updateSale($id) {
       
        $id = $id;
        $customer = $_POST['customer'];
        $invoice = $_POST['invoice'];
        $dates = $_POST['dates'];
        $seller = $_POST['seller'];
        $product = $_POST['product'];
        $quantity = $_POST['quantity'];
        $unitprice = $_POST['unitprice'];
        $amount = $_POST['amount'];
       
        if (
            !empty($id) &&
            !empty($customer) &&
            !empty($invoice) &&
            !empty($dates) &&
            !empty($seller) &&
            !empty($product) &&
            !empty($quantity) &&
            !empty($unitprice) &&
            !empty($amount)
        ) {
           
             $sale = $this->model->updateSaleFromDB($customer, $invoice, $dates, $seller, $product, $quantity, $unitprice, $amount, $id);
             $this->view->showHomeLocation($sale);

    }}

    

   
}
