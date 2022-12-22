<!-- this file generates the table content of reiter.php -->

<link rel="stylesheet" type="text/css" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<?php

// array to store rows of the table
$reiter = array(
    0 => array(
        "Name" => "ToDo",
        "Beschreibung" => "Dinge die erledigt werden müssen."
    ),

    1 => array(
        "Name" => "Erledigt",
        "Beschreibung" => "Dinge die erledigt sind."
    ),

    2 => array(
        "Name" => "Verschoben",
        "Beschreibung" => "Dinge die später erledigt werden."
    )
);

// create each row
foreach ($reiter as $item) {
    // check if all attributes are set
    if (isset($item["Name"]) and isset($item["Beschreibung"])) {
        echo("<tr>");

        echo("<td>" . $item["Name"] . "</td>");
        echo("<td>" . $item["Beschreibung"] . "</td>");

        // create icons for last col
        echo("<td>");
        echo("<button type='button' class='btn float-end'><i class='fas fa-trash-alt' style='color: blue'></i></button>");
        echo("<button type='button' class='btn float-end'><i class='fas fa-edit' style='color: blue'></i></button>");
        echo("</td>");

        echo("</tr>");
    }
}

?>