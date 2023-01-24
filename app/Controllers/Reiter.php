<?php

namespace App\Controllers;

use App\Models\ReiterModel;

#[\AllowDynamicProperties]
class Reiter extends BaseController
{
    public function index()
    {
        if (isset($_SESSION["loggedIn"])) {

            $model = new ReiterModel();

            // if $_POST not empty -> delete or create reiter
            if (!empty($_POST)) {

                if (isset($_POST["save"])) {
                    $model -> createReiter();
                }

                if (isset($_POST["delete"])) {
                    $model -> deleteReiter();
                }

            }

            $data["title"] = "Reiter";
            $data["reiter"] = $model->getData();

            echo view("templates/header", $data);
            echo view("reiter", $data);
        }
        else {
            return redirect()->to(base_url());
        }
    }


    // function receives reiter id + todo
    // 0 -> delete
    // 1 -> create / update
    public function updateDelete($id, $todo) {

        $model = new ReiterModel();

        $data = $model->getReiter($id);
        $data["title"] = "Reiter";
        $data["reiter"] = $model->getData();
        $data["updateDelete"] = $todo;

        echo view("templates/header", $data);
        echo view("reiter", $data);
    }
}