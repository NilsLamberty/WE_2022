<?php

namespace App\Controllers;

use App\Models\PersonsModel;
use App\Models\ProjectsModel;

#[\AllowDynamicProperties]
class Login extends BaseController
{

    public function index()
    {
        helper(["form"]);

        if (isset($_SESSION["loggedIn"])) {
            $this->session->destroy();
        }


        // validate inputs
        if ($this->validation->run($_POST, "login")) {


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
        // if validation went wrong -> show errors
        else if (isset($_POST["mail"]) or isset($_POST['password']) or isset($_POST["agb"])){
            $data["error"] = $this->validation->getErrors();
        }



        $data["title"] = "LogIn";

        echo view("templates/header", $data);
        echo view('login', $data);
    }

}