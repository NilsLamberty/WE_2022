<?php

namespace App\Controllers;

class Reiter extends BaseController
{
    public function index()
    {

        if (isset($_SESSION["loggedIn"])) {

            $data["title"] = "Reiter";

            echo view("templates/header", $data);
            echo view("reiter");
        }
        else {
            return redirect()->to(base_url());
        }
    }
}