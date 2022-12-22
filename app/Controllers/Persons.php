<?php

namespace App\Controllers;

class Persons extends BaseController
{
    public function index()
    {
        $data["title"] = "Personen";
        $data["mitglieder"] =
            array(
                0 => array(
                    "Name" => "Max Mustermann",
                    "E-Mail" => "mustermann@muster.de",
                    "inProject" => true
                ),
                1 => array(
                    "Name" => "Petra Müller",
                    "E-Mail" => "petra@mueller.de",
                    "inProject" => false
                )
            );

        echo view("templates/header", $data);
        echo view("persons", $data);
    }
}