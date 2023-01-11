<?php

namespace App\Controllers;

use App\Models\PersonsModel;

class Persons extends BaseController
{
    public function index()
    {

        var_dump($_POST);

        if (isset($_SESSION["loggedIn"])) {

            $model = new PersonsModel();

            if (!empty($_POST)) {
                $model->createPerson();
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


    public function editPerson($data) {
        $data["title"] = "Personen";

        $personModel = new PersonsModel();
        $data["mitglieder"] = $personModel->getData();

        echo view ("templates/header", $data);
        echo view("persons", $data);
    }


    public function updateDelete($id, $todo) {

        // delete
        if ($todo == 0) {
            $personModel = new PersonsModel();
            $personModel->deletePerson($id);
            return redirect()->to(base_url() . "/persons");
        }

        // update
        if ($todo == 1) {
            $personModel = new PersonsModel();
            $data = $personModel->getPerson($id);
            $this->editPerson($data);
        }

    }

}
?>
