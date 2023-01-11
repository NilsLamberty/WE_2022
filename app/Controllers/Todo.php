<?php

namespace App\Controllers;

class Todo extends BaseController
{
    public function index()
    {

        if (isset($_SESSION["loggedIn"])) {


            $data["title"] = "Todos (Aktuelles Projekt)";

            echo view("templates/header", $data);
            echo view("todo");
        }
        else {
            return redirect()->to(base_url());
        }
    }
}