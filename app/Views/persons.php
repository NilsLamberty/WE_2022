<div class="row p-3">

    <!-- side menu -->
    <? include ("sideMenu.php"); ?>


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
                            if (isset($person["Name"]) and isset($person["E-Mail"]) and isset($person["inProject"])) {

                                echo("<tr>");

                                echo("<td>" . $person["Name"] . "</td>");
                                echo("<td>" . $person["E-Mail"] . "</td>");

                                // if person is in project -> checkbox is checked
                                if ($person["inProject"])
                                    echo("<td><input class='form-check-input' type='checkbox' value='' checked></td>");
                                else
                                    echo("<td><input class='form-check-input' type='checkbox' value=''></td>");

                                // create icons for last col
                                echo("<td>");
                                echo("<button type='button' class='btn float-end'><i class='fas fa-trash-alt' style='color: blue'></i></button>");
                                echo("<button type='button' class='btn float-end'><i class='fas fa-edit' style='color: blue'></i></button>");
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
            <form>
                <div class="form-group pb-2">
                    <label for="userName" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="userName" placeholder="Username">
                </div>
                <div class="form-group pb-2">
                    <label for="email" class="form-label">E-Mail-Adresse:</label>
                    <input type="email" class="form-control" id="email" placeholder="E-Mail-Adresse eingeben">
                </div>
                <div class="form-group pb-2">
                    <label for="pwd" class="form-label">Passwort:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Passwort">
                </div>
                <div class="form-group pb-2">
                    <input type="checkbox" class="form-check-input" value="" id="checkBox">
                    <label for="checkBox" class="form-label">Dem Projekt zugeordnet</label>
                </div>
                <button type="button" class="btn btn-primary">Speichern</button>
                <button type="button" class="btn btn-info">Reset</button>
            </form>
        </div>

    </div>

    <!-- free space on right sides -->
    <div class="col-md-2"></div>

</div>


</body>
</html>