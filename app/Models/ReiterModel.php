<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class ReiterModel extends Model
{
    // get reiter of current project
    public function getData() {
        $this->reiter = $this->db->table("reiter");
        $this->reiter->select("*");
        $this->reiter->where("reiter.projektID", $_SESSION["projectID"]);
        $result = $this->reiter->get();

        return $result->getResultArray();
    }

    // get reiter by id or name
    public function getReiter($id = NULL, $name = NULL) {

        if ($id != NULL) {
            $this->reiter = $this->db->table("reiter");
            $this->reiter->select("*");
            $this->reiter->where("id", $id);
            $result = $this->reiter->get();

            return $result->getRowArray();
        }
        if ($name != NULL) {
            $this->reiter = $this->db->table("reiter");
            $this->reiter->select("id");
            $this->reiter->where("name", $name);
            $result = $this->reiter->get();

            return $result->getRowArray();
        }

    }


    // create reiter
    public function createReiter() {

        if (isset($_POST["id"]) and !empty($_POST["id"])) {
            $data = [
                "name" => $_POST["name"],
                "beschreibung" => $_POST["description"],
            ];
            $this->reiter = $this->db->table("reiter");
            $this->reiter->where("reiter.id", $_POST["id"]);
            $this->reiter->update($data);
        }
        else {
            $data = [
                "name" => $_POST["name"],
                "beschreibung" => $_POST["description"],
                "projektID" => $_SESSION["projectID"]
            ];
            $this->reiter = $this->db->table("reiter");
            $this->reiter->insert($data);
        }

    }


    // delete reiter
    public function deleteReiter() {

        if ($_POST["id"] != -1) {
            $this->reiter = $this->db->table("reiter");
            $this->reiter->where("reiter.id", $_POST["id"]);
            $this->reiter->delete();
        }
    }


    // get all reiter in currentProjects
    public function getReiterInProject($projectID) {
        if ($projectID != null) {
            $this->reiter = $this->db->table("reiter");
            $this->reiter->select("*");
            $this->reiter->where("reiter.projektID", $projectID);
            $result = $this->reiter->get();

            return $result->getResultArray();
        }
    }
}