<?php

class TaskView{

    function __construct()
    {
        
    }

    function showTasks($tasks) {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '" />   
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <title>Check List</title>
        </head>
        <body class="p-3 m-0 border-0 bd-example">
        
            
            <h1>Tareas 2022</h1>

            <ul>';
            foreach ($tasks as $tarea) {
            if ($tarea->finalizada == 1) {
                $html .= '<li> <strike>' . $tarea->titulo . ': ' . $tarea->descripcion . ' - ' . 
                '<a href="deleteTask/' . $tarea->id_tarea . '" class="btn btn-outline-secondary btn-sm">Borrar</a> - <a 
                href="Task/' . $tarea->id_tarea . '"class="btn btn-outline-secondary btn-sm">Done</a>' . '</strike> </li>';
            } else {
                $html .= '<li>' . '<a href="getTask/' . $tarea->id_tarea . '">' . $tarea->titulo . 
                '</a>' . ': ' . $tarea->descripcion . ' - ' . '<a href="deleteTask/' . $tarea->id_tarea . 
                '" class="btn btn-outline-danger btn-sm">Borrar</a> - <a href="updateTask/' . $tarea->id_tarea . '"class="btn btn-outline-success btn-sm">Done</a>' . '</li>'; //1er columna de la tabla
            }
        }

        $html .= '      
            </ul>

            <!-- Example Code -->
        
            <form class="row gx-3 gy-2 align-items-center" action="createTask" method="post">
                <div class="col-sm-3">
                <input type="text" name="title" class="form-control" id="specificSizeInputName" placeholder="Titulo">
                </div>
                <div class="col-sm-3">
                <input type="text" name="description" class="form-control" id="specificSizeInputName" placeholder="Descripción">
                </div>
                        <div class="col-sm-3">
                <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                <select type="number" class="form-select" id="priority" name="priority">
                    <option selected="">Choose...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                </div>
                <div class="col-auto">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="done" id="done">
                    <label class="form-check-label" for="autoSizingCheck2">
                    Done
                    </label>
                </div>
                </div>
                <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        
       
        </body>
        </html>
        ';
        echo $html;
    }
    function showHomeLocation(){
        header("Location: ".BASE_URL."home"); 
    }

    function showTask($task){
        echo '
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <base href="'.BASE_URL.'" />   
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
                <title>Check List</title>
            </head>
            <body class="p-3 m-0 border-0 bd-example">
            
                
                <h1>Titulo:'.$task->titulo.'</h1>
                <h2>Descripción: '.$task->descripcion.'</h2>
                <h3>Prioridad: '.$task->prioridad.'</h3>
                <h3>Finalizada: '.$task->finalizada.'</h3>
            
            <a href="home">Volver</a>
            </body>
            </html>
        ' ;
    }
}