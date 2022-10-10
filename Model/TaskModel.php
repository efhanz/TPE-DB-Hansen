<?php

class TaskModel{

    private $db;

function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=tasks2022;charset=utf8', 'root', '');
}
 
function getTasks() {  
    //prepare($sqlQuery) - permite la creación de una sentencia para su posterior uso:
    $sentencia = $this->db->prepare( "SELECT * FROM tareas");
    
    //execute($array) ejecuta la sentencia que tenemos preparada:
    $sentencia->execute();
    
    //fetch() 
    //Itera sobre las tuplas(ROWs) seleccionadas y nos trae al php la tabla 
    //fetchall trae toda la tabla en un objeto
    $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
    //Procesamos los datos para generar el HTML
    //foreach($tareas as $tarea)
     return $tareas;
    }

    function insertTask($titulo, $descripcion, $prioridad, $finalizada){
        $sentencia = $this->db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad, finalizada) VALUES(?, ?, ?, ?)");
        $sentencia->execute(array($titulo, $descripcion, $prioridad, $finalizada));
    }

    function deleteTaskFromDB($id) {
        $sentencia = $this->db->prepare("DELETE FROM tareas WHERE id_tarea=?");
        $sentencia-> execute(array($id));
    }

    function updatetaskfromDB($id) {
        $sentencia = $this->db->prepare("UPDATE tareas SET finalizada=1 WHERE id_tarea=?");
        $sentencia->execute(array($id));  
    }

    function getTaskfromDB($id){
        $sentencia = $this->db->prepare("SELECT * FROM tareas WHERE id_tarea=?");
        $sentencia->execute(array($id));
        $task = $sentencia->fetch(PDO::FETCH_OBJ);
        return $task;
    }
}