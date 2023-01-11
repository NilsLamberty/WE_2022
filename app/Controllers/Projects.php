<?php

namespace App\Controllers;

class Projects extends BaseController
{
    public function index()
    {

        if (isset($_SESSION["loggedIn"])) {

            $data["title"] = "Projekte";

            echo view("templates/header", $data);
            echo view("projects");
        }
        else {
            return redirect()->to(base_url());
        }
    }
}