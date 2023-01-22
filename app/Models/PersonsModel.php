<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
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
                $data["password"] = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
            }
            $this->person = $this->db->table("mitglieder");
            $this->person->where("mitglieder.email", $_POST["email"]);
            $this->person->update($data);
        }
    }


    public function deletePerson() {

        // get id
        $id = -1;
        $tableData = $this->getData();
        foreach ($tableData as $mitglied) {
            if ($mitglied["email"] == $_POST["email"]) {
                 $id = $mitglied["id"];
            }
        }

        // delete person
        if ($id != -1) {
            $this->person = $this->db->table("mitglieder");
            $this->person->where("mitglieder.id", $id);
            $this->person->delete();
        }


    }


    public function getPerson($id = NULL, $name = NULL) {
        if ($id != NULL) {
            $this->person = $this->db->table("mitglieder");
            $this->person->select("username, email, inProject, password");
            $this->person->where("id", $id);
            $result = $this->person->get();

            return $result->getRowArray();
        }
        if ($name != NULL) {
            $this->person = $this->db->table("mitglieder");
            $this->person->select("id");
            $this->person->where("username", $name);
            $result = $this->person->get();

            return $result->getRowArray();
        }
    }


    public function personInProject($projectID, $personID): bool
    {
        $this->person = $this->db->table("projekte_mitglieder");
        $this->person->select("*");
        $this->person->where("projekte_mitglieder.projektID", $projectID);
        $this->person->where("projekte_mitglieder.mitgliedID", $personID);
        $result = $this->person->get();

        if (empty($result->getRowArray())) {
            return false;
        }
        else {
            return true;
        }

    }

    public function getPersonID($mail) {
        $this->person = $this->db->table("mitglieder");
        $this->person->select("id");
        $this->person->where("mitglieder.email", $mail);
        $result = $this->person->get();

        return $result->getRowArray();
    }


}