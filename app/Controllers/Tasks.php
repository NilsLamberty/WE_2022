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


        echo view("templates/header", $data);
        echo view("tasks", $data);
    }
}