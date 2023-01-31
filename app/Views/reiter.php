<div class="row p-3">


    <div class="col-md-1"></div>
    <!-- side menu -->
<!--    --><?php //include ("sideMenu.php"); ?>

    <div class="col-md-10">

        <!-- table -->
        <div class="row pb-2 ps-3 pe-3">
            <table class="table">
                <thead>
                <tr class="table-secondary">
                    <th>Name</th>
                    <th>Beschreibung</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <!-- create table data -->
<!--                --><?php //include ("tables/tableReiter.php"); ?>
                <?php

                    if (isset($reiter) and !(empty($reiter))) {
                        // create each row
                        foreach ($reiter as $r) {

                            // check if all attributes are set
                            if (isset($r["name"]) and isset($r["beschreibung"])) {

                                echo("<tr>");
                                echo("<td>" . $r["name"] . "</td>");
                                echo("<td>" . $r["beschreibung"] . "</td>");
                                // create icons for last col
                                echo("<td>");
                                $delete = "<a type='button' href='" . base_url('/Reiter/updateDelete/' . $r["id"] . '/0') . "' name='deleteButton' class='btn float-end'><i class='fas fa-trash-alt' style='color: blue'></i></a>";
                                echo($delete);
                                $update = "<a type='button' href='" . base_url('/Reiter/updateDelete/' . $r["id"] . '/1') . "' name='deleteButton' class='btn float-end'><i class='fas fa-edit' style='color: blue'></i></a>";
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
            <form action="<?= base_url() . '/reiter' ?>" method="post">
                <div class="form-group pb-2">
                    <label for="riderName" class="form-label">Bezeichnung des Reiters:</label>
                    <input type="text" class="form-control" id="riderName" placeholder="Reiter" name="name"
                    value="<?php
                            if (isset($name)) {
                                echo $name;
                            } else {
                                echo ' ';
                            }
                    ?>">
                </div>
                <div class="form-group pb-2">
                    <label for="riderDesc" class="form-label">Beschreibung</label>
                    <textarea class="form-control" id="riderDesc" placeholder="Beschreibung" name="description"><?php
                            if (isset($beschreibung)) {
                                echo $beschreibung;
                            } else {
                                echo ' ';
                            }
                        ?>
                    </textarea>
                </div>
                <?php
                    if (isset($updateDelete)) {
                        if ($updateDelete == 0) {
                            echo "<button type='submit' class='btn btn-danger' name='delete' onclick='deleteReiter()'>Löschen</button>";
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
                    <input name="id" value="<?= $id ?? '' ?>" id="reiterIDValue">
                </div>
            </form>
        </div>

    </div>

    <!-- free space on right side -->
    <div class="col-md-1"></div>

</div>

</body>
</html>