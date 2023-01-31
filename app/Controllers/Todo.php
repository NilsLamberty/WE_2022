<?php

namespace App\Controllers;

class Todo extends BaseController
{
    public function index()
    {

        if (isset($_SESSION["loggedIn"])) {


            $data["title"] = "Todos (Aktuelles Projekt)";
            $data["currentProjectID"] = $_SESSION["projectID"];

            echo view("templates/header", $data);
            echo view("templates/navigation");
            echo view("todo", $data);
        }
        else {
            return redirect()->to(base_url());
        }
    }
}