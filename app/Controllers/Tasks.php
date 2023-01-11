<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        if (isset($_SESSION["loggedIn"])) {

            $data["title"] = "Aufgaben";

            echo view("templates/header", $data);
            echo view("exercises");
        }
        else {
            return redirect()->to(base_url());
        }
    }
}