<?php

namespace App\Controllers;

use App\Models\ProjectsModel;

#[\AllowDynamicProperties]
class Projects extends BaseController
{
    public function index()
    {

        if (isset($_SESSION["loggedIn"])) {

            $model = new ProjectsModel();

            if (!empty($_POST)) {

                if (isset($_POST["save"])) {
                    $model -> createProject();
                    $_SESSION["updateID"] = null;
                }
                else if (isset($_POST["delete"]) and isset($_POST["select"])) {
                    $model -> deleteProject();
                    $_SESSION["updateID"] = null;
                }
                else if (isset($_POST["update"]) and isset($_POST["select"])) {

                    $data["name"] = $_POST["select"];
                    $description = $model -> getDescription($data["name"]);
                    $id = $model -> getProjectId($data["name"]);
                    $_SESSION["updateID"] = $id["id"];
                    $data["description"] = $description["beschreibung"];
                }
                else if (isset($_POST["choose"]) and isset($_POST["select"])) {
                    $id = $model->getProjectId($_POST["select"]);
                    $_SESSION["projectID"] = $id["id"];
                    $_SESSION["updateID"] = null;
                }
                else {
                    $_SESSION["updateID"] = null;
                }

            } else {
                $_SESSION["updateID"] = null;
            }

            $data["title"] = "Projekte";
            $data["projects"] = $model->getData();

            echo view("templates/header", $data);
            echo view("templates/navigation", $data);
            echo view("projects", $data);
        }
        else {
            return redirect()->to(base_url());
        }
    }

    public function updateDelete($id, $todo) {

    }

}