<?php

namespace App\Controllers;

use App\Models\PersonsModel;

#[\AllowDynamicProperties]
class Persons extends BaseController
{
    public function index()
    {


        if (isset($_SESSION["loggedIn"])) {

            $model = new PersonsModel();

            // if $_POST not empty -> save or delete person
            if (!empty($_POST)) {

                if (isset($_POST["save"])) {
                    $model -> createPerson();
                }

                if (isset($_POST["delete"])) {
                    $model -> deletePerson();
                }

            }

            $data["mitglieder"] = $model->getData();

            $data["title"] = "Personen";
            echo view("templates/header", $data);
            echo view("persons", $data);
        }
        else {
            return redirect()->to(base_url());
        }
    }


    // function receives person id + todo
    // 0 -> delete
    // 1 -> create / update
    public function updateDelete($id, $todo) {


        $personModel = new PersonsModel();

        $data = $personModel->getPerson($id);
        $data["title"] = "Personen";
        $data["mitglieder"] = $personModel->getData();
        $data["updateDelete"] = $todo;

        echo view ("templates/header", $data);
        echo view("persons", $data);

    }

}
?>
