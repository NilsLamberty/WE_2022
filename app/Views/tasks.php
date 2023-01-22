<div class="row p-3">

    <!-- side menu -->
    <?php include ("sideMenu.php"); ?>

    <div class="col-md-8">

        <!-- table -->
        <div class="row pb-2 ps-3 pe-3">
            <table class="table">
                <thead class="table-secondary">
                <th>Aufgabenbezeichnung:</th>
                <th>Beschreibung der Aufgabe:</th>
                <th>Reiter:</th>
                <th>Zuständig:</th>
                <th></th>
                </thead>
                <tbody>
                <!-- create table data -->
                <?php

                    $reiterModel = new \App\Models\ReiterModel();
                    $personModel = new \App\Models\PersonsModel();

                    if (isset($tasks) and !(empty($tasks))) {
                        // create each row
                        foreach ($tasks as $t) {

                            // check if all attributes are set
                            if (isset($t["name"]) and isset($t["beschreibung"]) and isset($t["erstellerID"]) and isset($t["reiterID"])) {

                                echo("<tr>");
                                echo("<td>" . $t["name"] . "</td>");
                                echo("<td>" . $t["beschreibung"] . "</td>");
                                echo("<td>" . $reiterModel->getReiter($t["reiterID"])["name"] . "</td>");
                                echo("<td>" . $personModel->getPerson($t["erstellerID"])["username"] . "</td>");
                                // create icons for last col
                                echo("<td>");
                                $delete = "<a type='button' href='" . base_url('/Tasks/updateDelete/' . $t["id"] . '/0') . "' name='deleteButton' class='btn float-end'><i class='fas fa-trash-alt' style='color: blue'></i></a>";
                                echo($delete);
                                $update = "<a type='button' href='" . base_url('/Tasks/updateDelete/' . $t["id"] . '/1') . "' name='deleteButton' class='btn float-end'><i class='fas fa-edit' style='color: blue'></i></a>";
                                echo($update);
                                echo("</td>");
                                echo("</tr>");

                            }

                        }
                    }

                ?>
                </tbody>
            </table>
        </div>

        <!-- edit option -->
        <div class="row pb-2">
            <label class="form-label form-header">Bearbeiten/Erstellen</label>
            <form action="<?= base_url() . '/tasks' ?>" method="post">
                <div class="form-group pb-2">
                    <label for="exerciseName" class="form-label">Aufgabenbezeichnung:</label>
                    <input type="text" class="form-control" id="exerciseName" placeholder="Aufgabe" name="name"
                    value="<?php
                            if (isset($name)) {
                                echo $name;
                            } else {
                                echo ' ';
                            }
                    ?>">
                </div>
                <div class="form-group pb-2">
                    <label for="exerciseDesc" class="form-label">Beschreibung der Aufgabe:</label>
                    <textarea class="form-control" id="exerciseDesc" placeholder="Beschreibung" name="description"><?php
                            if (isset($beschreibung)) {
                                echo $beschreibung;
                            } else {
                                echo ' ';
                            }
                        ?></textarea>
                </div>
                <div class="form-group pb-2">
                    <label for="creationDate" class="form-label">Erstellungsdatum:</label>
                    <input type="text" class="form-control" id="creationDate" placeholder="01.01.19" name="creationDate"
                    value="<?php
                            if (isset($erstellungsdatum)) {
                                echo $erstellungsdatum;
                            } else {
                                echo ' ';
                            }
                    ?>">
                </div>
                <div class="form-group pb-2">
                    <label for="dueDate" class="form-label">fällig bis:</label>
                    <input type="text" class="form-control" id="dueDate" placeholder="01.01.19" name="dueDate"
                    value="<?php
                            if (isset($faelligkeitsdatum)) {
                                echo $faelligkeitsdatum;
                            } else {
                                echo ' ';
                            }
                    ?>">
                </div>
                <div class="form-group pb-2">
                    <label for="selectRider" class="form-label">Reiter:</label>
                    <select class="form-select" id="selectRider" name="selectReiter">
                        <?php

                            $reiterModel = new \App\Models\ReiterModel();
                            $reiter = $reiterModel->getData();
                            foreach ($reiter as $r) {
                                if (isset($reiterID) and $reiterID == $r["id"]) {
                                    echo "<option selected>" . $r["name"] . "</option>";
                                } else {
                                    echo "<option>" . $r["name"] . "</option>";
                                }
                            }

                        ?>
                    </select>
                </div>
                <div class="form-group pb-2">
                    <label for="personSelect" class="form-label">Zuständig:</label>
                    <select class="form-select" id="personSelect" name="selectPerson">
                        <?php

                            $personModel = new \App\Models\PersonsModel();
                            $persons = $personModel -> getData();
                            foreach ($persons as $p) {
                                if (isset($erstellerID) and $erstellerID == $p["id"]) {
                                    echo "<option selected>" . $p["username"] . "</option>";
                                } else {
                                    echo "<option>" . $p["username"] ."</option>";
                                }
                            }

                        ?>
                    </select>
                </div>
                <?php
                if (isset($updateDelete)) {
                    if ($updateDelete == 0) {
                        echo "<button type='submit' class='btn btn-danger' name='delete'>Löschen</button>";
                    }
                    if ($updateDelete == 1) {
                        echo "<button type='submit' class='btn btn-primary' name='save'>Speichern</button>";
                    }
                }
                else {
                    echo "<button type='submit' class='btn btn-primary' name='save'>Speichern</button>";
                }
                ?>
                <button type="reset" class="btn btn-info">Reset</button>
                <?php
                if (isset($name)) {
                    echo "<a type='button' href='" . base_url() . "/persons" ."' class='btn btn-info' onclick='history.back()' name='abort'>Abbrechen</a>";
                }
                ?>
                <div class="invisible">
                    <input name="id" value="<?= $id ?? '' ?>">
                </div>
            </form>
        </div>

    </div>

    <!-- free space on right side -->
    <div class="col-md-2"></div>

</div>

</body>
</html>