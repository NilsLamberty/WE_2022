<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectsModel extends Model
{
    public function getData() {
        $result = $this->db->query("SELECT * FROM projekte");
        return $result->getResultArray();
    }

    public function getProject($mitgliedId) {
        $this->project = $this->db->table("projekte_mitglieder");
        $this->project->select("projektID");
        $this->project->where("mitgliedID", $mitgliedId);
        $result = $this->project->get();

        return $result->getRowArray();
    }
}