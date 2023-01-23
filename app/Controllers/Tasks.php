<?php

namespace App\Controllers;

use App\Models\PersonsModel;
use App\Models\TasksModel;

#[\AllowDynamicProperties]
class Tasks extends BaseController
{
    public function index()
    {

        if (isset($_SESSION["loggedIn"])) {

            $model = new TasksModel();

            if (!empty($_POST)) {

//                var_dump($_POST);
//                die();

                if (isset($_POST["save"])) {
                    $model -> createTask();
                }

                if (isset($_POST["delete"])) {
                    $model -> deleteTask();
                }

            }

            $data["title"] = "Aufgaben";
            $data["tasks"] = $model -> getProjectTasks();

            echo view("templates/header", $data);
            echo view("tasks", $data);
        }
        else {
            return redirect()->to(base_url());
        }
    }


    public function updateDelete($id, $todo) {

        $model = new TasksModel();

        $data = $model -> getTask($id);
        $data["title"] = "Aufgaben";
        $data["tasks"] = $model -> getProjectTasks();
        $data["updateDelete"] = $todo;
        $data["personsForTasks"] = ($model -> getPersons($id));

//        $personsForTask = $model -> getPersons($id);
//
//        $data["personsForTask"] = null;
//
//        foreach ($personsForTask as $p) {
//            if ($p["list"] != null) {
//                $data["personsForTask"] = $p;
//            }
//        }

        echo view("templates/header", $data);
        echo view("tasks", $data);
    }
}