<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class TasksModel extends Model
{
    // get all tasks
    public function getData() {
        $result = $this->db->query("SELECT * FROM aufgaben");
        return $result->getResultArray();
    }

    // get tasks of current project
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

    // get task by id
    public function getTask($id = NULL) {

        if($id != null) {
            $this->task = $this->db->table("aufgaben");
            $this->task->select("*");
            $this->task->where("aufgaben.id", $id);
            $result = $this->task->get();

            return $result -> getRowArray();
        }

    }

    // create task
    public function createTask() {

        // get erstellerID
        $personModel = new PersonsModel();
        $person = $personModel -> getPersonID($_SESSION["mail"]);

        // get reiterID
        $reiterModel = new ReiterModel();
        $reiter = $reiterModel -> getReiter($id = NULL, $name = $_POST["selectReiter"]);

        // if new task is created -> increase id manually in order to insert into aufgaben_mitglieder
        $newID = [];

        // update task
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
        // create new task
        else {

            $newID = $this->getHighestTaskId();
            $newIDValue = $newID["max(id)"] + 1;

            $data = [
                "id" => $newIDValue,
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

        if (isset($_POST["selectMultiple"]) and !empty($_POST["selectMultiple"])) {

            if (isset($_POST["id"]) and !empty($_POST["id"])) {
                $this->deleteAllTaskPersonIds();
            }

            foreach ($_POST["selectMultiple"] as $person) {


                if (isset($_POST["id"]) and !empty($_POST["id"])) {
                    $data = [
                        "aufgabeID" => $_POST["id"],
                        "mitgliedID" => $person
                    ];
                } else {
                    $data = [
                        "aufgabeID" => $newIDValue,
                        "mitgliedID" => $person
                    ];
                }

                try {
                    $this->taskPerson = $this->db->table("aufgaben_mitglieder");
                    $this->taskPerson->insert($data);
                } catch (\Exception $e) {}

            }
        }
    }


    // delete task
    public function deleteTask() {
        $this->task = $this->db->table("aufgaben");
        $this->task->where("aufgaben.id", $_POST["id"]);
        $this->task->delete();

    }

    // get involved persons (n:n)
    public function getPersons($id) {

        $this->task = $this->db->table("aufgaben");
        $this->task->select("group_concat(mitglieder.id, '\n' SEPARATOR '') as list");
        $this->task->join("aufgaben_mitglieder", "aufgaben.id = aufgaben_mitglieder.aufgabeID and aufgaben.id = " . $id, "left");
        $this->task->join("mitglieder", "aufgaben_mitglieder.mitgliedID = mitglieder.id", "left");
        $this->task->groupBy("aufgaben.id");
        $result = $this->task->get()->getResultArray();
        return $result;

    }

    // returns the highest task id
    public function getHighestTaskId() {
        $this->tasks = $this->db->table("aufgaben");
        $this->tasks->select("max(id)");
        $result = $this->tasks->get();

        return $result->getRowArray();
    }


    // delete rows in aufgaben_mitglieder if task is deleted
    public function deleteAllTaskPersonIds() {
          $this->tasks = $this->db->table("aufgaben_mitglieder") ;
          $this->tasks->where("aufgabeID", $_POST["id"]);
          $this->tasks->delete();
    }
}