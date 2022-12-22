<?php

namespace App\Controllers;

class Exercises extends BaseController
{
    public function index()
    {
        $data["title"] = "Aufgaben";

        echo view("templates/header", $data);
        echo view("exercises");
    }
}