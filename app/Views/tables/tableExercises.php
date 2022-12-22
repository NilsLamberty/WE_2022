<!-- this file generates the table content for aufgaben.php -->

<link rel="stylesheet" type="text/css" href="../bootstrap-5.2.3-dist/css/bootstrap.css">

<?php

// array to store rows of table
$exercises = array(
    0 => array(
        "Aufgabenbezeichnung" => "HTML Datei erstellen",
        "Beschreibung" => "HTML Datei erstellen",
        "Reiter" => "ToDo",
        "Zuständig" => "Max Mustermann"
    ),

    1 => array(
        "Aufgabenbezeichnung" => "CSS Datei erstellen",
        "Beschreibung" => "CSS Datei erstellen",
        "Reiter" => "ToDo",
        "Zuständig" => "Max Mustermann"
    ),

    2 => array(
        "Aufgabenbezeichnung" => "PC eingeschaltet",
        "Beschreibung" => "PC einschalten",
        "Reiter" => "Erledigt",
        "Zuständig" => "Max Mustermann"
    ),

    3 => array(
        "Aufgabenbezeichnung" => "Kaffee trinken",
        "Beschreibung" => "Kaffee trinken",
        "Reiter" => "Erledigt",
        "Zuständig" => "Petra Müller"
    ),

    4 => array(
        "Aufgabenbezeichnung" => "Für die Uni lernen",
        "Beschreibung" => "Für die Uni lernen",
        "Reiter" => "Verschoben",
        "Zuständig" => "Max Mustermann"
    ),
);

// create each row
foreach ($exercises as $exercise) {
    // check if all attributes are set
    if (isset($exercise["Aufgabenbezeichnung"]) and isset($exercise["Beschreibung"]) and isset($exercise["Reiter"]) and isset($exercise["Zuständig"])) {
        echo("<tr>");

        echo("<td>" . $exercise["Aufgabenbezeichnung"] . "</td>");
        echo("<td>" . $exercise["Beschreibung"] . "</td>");
        echo("<td>" . $exercise["Reiter"] . "</td>");
        echo("<td>" . $exercise["Zuständig"] . "</td>");


        // create icons for last col
        echo("<td>");
        echo("<button type='button' class='btn float-end'><i class='fas fa-trash-alt' style='color: blue'></i></button>");
        echo("<button type='button' class='btn float-end'><i class='fas fa-edit' style='color: blue'></i></button>");
        echo("</td>");

        echo("</tr>");
    }
}

?>