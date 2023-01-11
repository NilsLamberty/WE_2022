<?php

namespace App\Controllers;

use App\Models\PersonsModel;
use App\Models\ProjectsModel;

class Login extends BaseController
{

    public function index()
    {
        helper(["form"]);

        echo password_hash("234", PASSWORD_DEFAULT);

        if (isset($_SESSION["loggedIn"])) {
            $this->session->destroy();
        }

        if (isset($_POST["mail"]) and isset($_POST["password"])) {

            var_dump($_POST);

            $model = new PersonsModel();
            $data = $model->login();

            if ($data != NULL) {

                $password = $data["password"];

                if (password_verify($_POST["password"], $password)) {

                    $this->session->set("mail", $_POST["mail"]);
                    $this->session->set("name", $data["username"]);
                    $this->session->set("loggedIn", true);

                    $projectModel = new ProjectsModel();
                    $project = $projectModel->getProject($data["id"]);
                    if(!empty($project)) {
                        $this->session->set("projectID", $project["projektID"]);
                    }

                    return redirect()->to(base_url() . "/todo");
                }
            }

        }

        $data["title"] = "LogIn";

        echo view("templates/header", $data);
        echo view('login');
    }

}