<?php

function getTasks() {
//    Creamos una nueva conexión:
//    servidor: localhost
//    base de datos: db_tareas
//    usuario: root
//    contraseña: root  (en xampp generalmente es vacía)
    $db = new PDO('mysql:host=localhost;'
.'dbname=tasks2022;charset=utf8'
, 'root', '');

//prepare($sqlQuery) 
//permite la creación de una sentencia para su posterior uso:
$sentencia = $db->prepare( "SELECT * FROM tareas");

//execute($array) 
//ejecuta la sentencia que tenemos preparada:
$sentencia->execute();

//fetch() 
//Itera sobre las tuplas(ROWs) seleccionadas y nos trae al php la tabla 
//fetchall trae toda la tabla en un objeto
$tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);

//Procesamos los datos para generar el HTML
//foreach($tareas as $tarea) {
  //  echo $tarea->titulo; //1er columna de la tabla  
 return $tareas;

}
function getTaskfromDB($id){
    $db = new PDO('mysql:host=localhost;'
    .'dbname=tasks2022;charset=utf8'
    , 'root', '');
    $sentencia = $db->prepare("SELECT * FROM tareas WHERE id_tarea=?");
    $sentencia->execute(array($id));
    $tarea = $sentencia->fetch(PDO::FETCH_OBJ);
    return $tarea;
}

function insertTask($titulo, $descripcion, $prioridad, $finalizada){
    $db = new PDO('mysql:host=localhost;'
    .'dbname=tasks2022;charset=utf8'
    , 'root', '');
    $sentencia = $db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad, finalizada) VALUES(?, ?, ?, ?)");
    $sentencia->execute(array($titulo, $descripcion, $prioridad, $finalizada));

}
function deleteTaskFromDB($id) {
    $db = new PDO('mysql:host=localhost;'
    .'dbname=tasks2022;charset=utf8'
    , 'root', '');
    $sentencia = $db->prepare("DELETE FROM tareas WHERE id_tarea=?");
    $sentencia-> execute(array($id));
}
function updatetaskfromDB($id) {
    $db = new PDO('mysql:host=localhost;'
    .'dbname=tasks2022;charset=utf8'
    , 'root', '');
    $sentencia = $db->prepare("UPDATE tareas SET finalizada=1 WHERE id_tarea=?");
    $sentencia->execute(array($id));  
}

