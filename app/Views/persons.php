<div class="row p-3">

    <div class="col-md-2"></div>

    <!-- side menu -->
<!--    --><?php //include ("sideMenu.php"); ?>

    <div class="col-md-8">

        <!-- table -->
        <div class="row pb-2 ps-3 pe-3">
            <table class="table">
                <thead class="table-secondary">
                <th>Name</th>
                <th>E-Mail</th>
                <th>In Projekt</th>
                <th></th>
                </thead>
                <tbody>
                <!-- create table data -->
                <?php

                    if (isset($mitglieder) and !(empty($mitglieder)))
                    {
                        // create each row
                        foreach ($mitglieder as $person) {
                            // check if all attributes are set
                            if (isset($person["username"]) and isset($person["email"]) and isset($person["inProject"])) {

                                echo("<tr>");

                                echo("<td>" . $person["username"] . "</td>");
                                echo("<td>" . $person["email"] . "</td>");

                                // if person is in project -> checkbox is checked
                                $model = new \App\Models\PersonsModel();
                                $id = $model->getPersonID($person["email"])["id"];

                                if ($model->personInProject($_SESSION["projectID"], $model->getPersonID($person["email"])["id"])) {
                                    echo("<td><input class='form-check-input' type='checkbox' value='' checked></td>");
                                }
                                else {
                                    echo("<td><input class='form-check-input' type='checkbox' value=''></td>");
                                }

//                                if ($person["inProject"])
//                                    echo("<td><input class='form-check-input' type='checkbox' value='' checked></td>");
//                                else
//                                    echo("<td><input class='form-check-input' type='checkbox' value=''></td>");

                                // create icons for last col
                                echo("<td>");
                                $delete = "<a type='button' href='" . base_url('/Persons/updateDelete/' . $person["id"] . '/0') . "' name='deleteButton' class='btn float-end'><i class='fas fa-trash-alt' style='color: blue'></i></a>";
                                echo($delete);
                                $update = "<a type='button' href='" . base_url('/Persons/updateDelete/' . $person["id"] . '/1') . "' name='deleteButton' class='btn float-end'><i class='fas fa-edit' style='color: blue'></i></a>";
                                echo($update);
                                echo("</td>");

                                echo("</tr>");
                            }
                        }
                    }
                    else
                    {
                        echo "<td>No active members in projects.</td>";
                    }

                ?>
                </tbody>
            </table>
        </div>

        <!-- edit option -->
        <div class="row pb-2">
            <label class="form-label form-header">Bearbeiten/Erstellen</label>
            <form action="<?php echo base_url() . "/persons" ?>" method="post">
                <div class="form-group pb-2">
                    <label for="userName" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="userName" placeholder="Username" name="name"
                           value="<?php
                           if (isset($username)) {
                               echo $username;
                           } else {
                               echo ' ';
                           }
                           ?>" >
                </div>
                <div class="form-group pb-2">
                    <label for="email" class="form-label">E-Mail-Adresse:</label>
                    <input type="email" class="form-control" id="email" placeholder="E-Mail-Adresse eingeben" name="email"
                           value="<?php
                           if (isset($email)) {
                               echo $email;
                           } else {
                               echo ' ';
                           }
                           ?>">
                </div>
                <?php
                if (!isset($email)) {
                    echo "
                    <div class='form-group pb-2'>
                    <label for='pwd' class='form-label'>Passwort:</label>
                    <input type='password' class='form-control' id='pwd' placeholder='Passwort' name='pwd'>
                    </div>";
                } else {
                    if ($_SESSION["mail"] == $email) {
                        echo "
                    <div class='form-group pb-2'>
                    <label for='pwd' class='form-label'>Passwort:</label>
                    <input type='password' class='form-control' id='pwd' placeholder='Passwort' name='pwd'>
                    </div>";
                    }
                }
                ?>
                <div class="form-group pb-2">
                    <input type="checkbox" class="form-check-input" value="" id="checkBox" name="inProject"
                        <?php if (isset($inProject) and $inProject) {
                            echo 'checked';
                        } ?>>
                    <label for="checkBox" class="form-label">Dem Projekt zugeordnet</label>
                </div>
                <?php
                    if (isset($updateDelete)) {
                        if ($updateDelete == 1) {
                            echo "<button type='submit' class='btn btn-primary' name='save'>Speichern</button>";
                        }
                        if ($updateDelete == 0) {
                            echo "<button type='submit' class='btn btn-danger' name='delete' onclick='deletePerson()'>Löschen</button>";
                        }
                    }
                    else {
                        echo "<button type='submit' class='btn btn-primary' name='save'>Speichern</button>";
                    }
                ?>
                <button type="reset" class="btn btn-info">Reset</button>
                <?php
                    if (isset($username)) {
                        echo "<a type='button' href='" . base_url() . "/persons" ."' class='btn btn-info' onclick='history.back()' name='abort'>Abbrechen</a>";
                    }
                ?>
            </form>
        </div>
    </div>

    <!-- free space on right sides -->
    <div class="col-md-2"></div>

</div>


</body>
</html>