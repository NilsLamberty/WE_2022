<?php

namespace App\Controllers;

class Todo extends BaseController
{
    public function index()
    {
        $data["title"] = "Todos (Aktuelles Projekt)";

        echo view("templates/header", $data);
        echo view("todo");
    }
}