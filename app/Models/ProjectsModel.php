<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class ProjectsModel extends Model
{
    // get all projects
    public function getData() {
        $result = $this->db->query("SELECT * FROM projekte");
        return $result->getResultArray();
    }

    // get projects by person with mitgliedID
    public function getProject($mitgliedId) {
        $this->project = $this->db->table("projekte_mitglieder");
        $this->project->select("projektID");
        $this->project->where("mitgliedID", $mitgliedId);
        $result = $this->project->get();

        return $result->getRowArray();
    }

    // create new project
    public function createProject() {

        // get id of person who creates / updates project
        $email = $_SESSION["mail"];
        $this->person = $this->db->table("mitglieder");
        $this->person->select("id");
        $this->person->where("email", $email);
        $result = $this->person->get();



        if (isset($_SESSION["updateID"])) {
            $data = [
                "name" => $_POST["projectName"],
                "beschreibung" => $_POST["projectDescription"],
                "erstellerID" => $result->getRowArray()["id"]
            ];
            $this->project = $this->db->table("projekte");
            $this->project->where("projekte.id", $_SESSION["updateID"]);
            $this->project->update($data);

            $_SESSION["updateID"] = null;
        }
        else {

            $data = [
                "name" => $_POST["projectName"],
                "beschreibung" => $_POST["projectDescription"],
                "erstellerID" => $result->getRowArray()["id"]
            ];
            $this->project = $this->db->table("projekte");
            $this->project->insert($data);
        }

    }

    // delete project
    public function deleteProject() {

        // get id
        $id = -1;
        $tableData = $this->getData();
        foreach ($tableData as $project) {
            if ($project["name"] == $_POST["select"]) {
                $id = $project["id"];
            }
        }

        if ($id != -1) {
            $this->project = $this->db->table("projekte");
            $this->project->where("projekte.id", $id);
            $this->project->delete();

            if ($id == $_SESSION["projectID"]) {
                $_SESSION["projectID"] = null;
            }

        }

    }

    // get project description
    public function getDescription($name) {
        if ($name != NULL) {

            $this->project = $this->db->table("projekte");
            $this->project->select("beschreibung");
            $this->project->where("projekte.name", $name);
            $result = $this->project->get();

            return $result->getRowArray();

        }
    }


    // get project id
    public function getProjectId($name) {
        if ($name != NULL) {

            $this->project = $this->db->table("projekte");
            $this->project->select("id");
            $this->project->where("projekte.name", $name);
            $result = $this->project->get();

            return $result->getRowArray();

        }
    }
}