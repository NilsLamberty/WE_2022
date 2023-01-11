<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonsModel extends Model
{
    public function getData() {
        $result = $this->db->query("SELECT * FROM mitglieder");
        return $result->getResultArray();
    }

    public function login() {
        $this->personen = $this->db->table("mitglieder");
        $this->personen->select("password, username, id");
        $this->personen->where("mitglieder.email", $_POST["mail"]);
        $result = $this->personen->get();

        return $result->getRowArray();
    }


    public function createPerson() {

        $inProject = false;
        if (isset($_POST["inProject"])) {
            $inProject = true;
        }

        $exists = false;

        $tableData = $this->getData();
        foreach ($tableData as $mitglied) {
            if ($mitglied["email"] == $_POST["email"]) {
                $exists = true;
            }
        }

        if (!$exists) {
            $data = [
                "username" => $_POST["name"],
                "email" => $_POST["email"],
                "inProject" => $inProject,
                "password" => password_hash($_POST["pwd"], PASSWORD_DEFAULT)
            ];
            $this->person = $this->db->table("mitglieder");
            $this->person->insert($data);
        }
        else {
            $data = [
                "username" => $_POST["name"],
                "email" => $_POST["email"],
                "inProject" => $inProject,
            ];
            if (isset($_POST["pwd"])) {
                $data["password"] = $_POST["pwd"];
            }
            $this->person = $this->db->table("mitglieder");
            $this->person->where("mitglieder.email", $_POST["email"]);
            $this->person->update($data);
        }


//        $data = [
//            "username" => $_POST["name"],
//            "email" => $_POST["email"],
//            "inProject" => $inProject,
//            "password" => password_hash($_POST["pwd"], PASSWORD_DEFAULT)
//        ];
//        $this->person = $this->db->table("mitglieder");
//        $this->person->insert($data);
    }

    public function deletePerson($id = NULL) {
        if ($id != NULL) {
            $this->person = $this->db->table("mitglieder");
            $this->person->where("mitglieder.id", $id);
            $this->person->delete();
        }
    }


    public function getPerson($id = NULL) {
        if ($id != NULL) {
            $this->person = $this->db->table("mitglieder");
            $this->person->select("username, email, inProject, password");
            $this->person->where("id", $id);
            $result = $this->person->get();

            return $result->getRowArray();
        }
    }
}