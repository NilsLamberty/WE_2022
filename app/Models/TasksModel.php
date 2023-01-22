<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class TasksModel extends Model
{
    public function getData() {
        $result = $this->db->query("SELECT * FROM aufgaben");
        return $result->getResultArray();
    }

    public function getProjectTasks() {

        // get Reiter ids of current project (project id stored in session)
        $this->reiter = $this->db->table("reiter");
        $this->reiter->select("id");
        $this->reiter->where("reiter.projektID", $_SESSION["projectID"]);
        $reiterResult = $this->reiter->get();
        $reiterResultData = $reiterResult->getResultArray();

        if (!empty($reiterResultData)) {
            $ids = [];
            foreach ($reiterResultData as $id) {
                $ids[] = $id["id"];
            }

            // get tasks that belong to the selected Reiter
            $this->tasks = $this->db->table("aufgaben");
            $this->tasks->select("*");
            $this->tasks->whereIn("aufgaben.reiterID", $ids);
            $result = $this->tasks->get();

            return $result -> getResultArray();
        }


    }

    public function getTask($id = NULL) {

        if($id != null) {
            $this->task = $this->db->table("aufgaben");
            $this->task->select("*");
            $this->task->where("aufgaben.id", $id);
            $result = $this->task->get();

            return $result -> getRowArray();
        }

    }

    public function createTask() {

        // get erstellerID
        $personModel = new PersonsModel();
        $person = $personModel -> getPerson($id = NULL, $name = $_POST["selectPerson"]);

        // get reiterID
        $reiterModel = new ReiterModel();
        $reiter = $reiterModel -> getReiter($id = NULL, $name = $_POST["selectReiter"]);

        if (isset($_POST["id"]) and !empty($_POST["id"])) {

            $data = [
                "name" => $_POST["name"],
                "beschreibung" => $_POST["description"],
                "erstellungsdatum" => $_POST["creationDate"],
                "faelligkeitsdatum" => $_POST["dueDate"],
                "erstellerID" => $person["id"],
                "reiterID" => $reiter["id"]
            ];
            $this->task = $this->db->table("aufgaben");
            $this->task->where("aufgaben.id", $_POST["id"]);
            $this->task->update($data);
        }
        else {

            $data = [
                "name" => $_POST["name"],
                "beschreibung" => $_POST["description"],
                "erstellungsdatum" => $_POST["creationDate"],
                "faelligkeitsdatum" => $_POST["dueDate"],
                "erstellerID" => $person["id"],
                "reiterID" => $reiter["id"]
            ];
            $this->task = $this->db->table("aufgaben");
            $this->task->insert($data);
        }
    }


    public function deleteTask() {
        $this->task = $this->db->table("aufgaben");
        $this->task->where("aufgaben.id", $_POST["id"]);
        $this->task->delete();

    }
}