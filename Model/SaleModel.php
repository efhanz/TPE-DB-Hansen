<?php

class SaleModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=tpe;charset=utf8', 'root', '');
    }

    function getSales()
    {

        $sentencia = $this->db->prepare("SELECT * FROM venta_de_productos"); //prepare($sqlQuery) - permite la creación de una sentencia para su posterior uso:
        $sentencia->execute();  //execute($array) ejecuta la sentencia que tenemos preparada:
        $sales = $sentencia->fetchAll(PDO::FETCH_OBJ); //fetch() //Itera sobre las tuplas(ROWs) seleccionadas y nos trae al php la tabla      //fetchall trae toda la tabla en un objeto
        return $sales;  //Procesamos los datos para generar el HTML //foreach($tareas as $tarea)
    }

    function getSaleFromDB($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM venta_de_productos WHERE Transaction_ID=?");
        $sentencia->execute(array($id));
        $sale = $sentencia->fetch(PDO::FETCH_OBJ);
        return $sale;
    }

    function insertSale($customer, $invoice, $dates, $seller, $product, $quantity, $unitprice, $amount)
    {
        $sentencia = $this->db->prepare("INSERT INTO venta_de_productos(Customer, Invoice, Date, Seller, Product, Quantity, Unit_Price, Amount) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($customer, $invoice, $dates, $seller, $product, $quantity, $unitprice, $amount));
    }




    function deleteSaleFromDB($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM venta_de_productos WHERE Transaction_ID=?");
        $sentencia->execute(array($id));
    }

    function updateSaleFromDB($customer, $invoice, $dates, $seller, $product, $quantity, $unitprice, $amount, $id)
    {
        $sentencia = $this->db->prepare("UPDATE venta_de_productos SET Customer=?, Invoice=?, Date=?, Seller=?, Product=?, Quantity=?, Unit_Price=?, Amount=? WHERE Transaction_ID=?");
        $sentencia->execute(array($customer, $invoice, $dates, $seller, $product, $quantity, $unitprice, $amount, $id));
        $sale = $sentencia->fetch(PDO::FETCH_OBJ);
        return $sale;
    }
}
