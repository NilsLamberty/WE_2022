<?php

namespace App\Controllers;

class Projects extends BaseController
{
    public function index()
    {
        $data["title"] = "Projekte";

        echo view("templates/header", $data);
        echo view("projects");
    }
}