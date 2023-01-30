<div class="row p-3">

    <div class="col-md-2"></div>

    <!-- side menu -->
<!--    --><?php //include ("sideMenu.php"); ?>

    <div class="col-md-8">

        <!-- select option -->
        <div class="row pb-2">
            <label class="form-label form-header">Projekt Auswählen</label>
            <form action="<?= base_url() . '/projects' ?>" method="post">
                <select class="form-select mb-2" name="select">
                    <option selected>- bitte auswählen - </option>

                    <?php

                    foreach ($projects as $p) {
                        echo "<option>" . $p["name"] . "</option>";
                    }

                    ?>

                </select>
                
                <button type="submit" class="btn btn-primary" name="choose">Auswählen</button>
                <button type="submit" class="btn btn-primary" name="update">Bearbeiten</button>
                <button type="submit" class="btn btn-danger" name="delete">Löschen</button>
            </form>
        </div>

        <!-- edit option -->
        <div class="row">
            <label class="form-label form-header">Projekt bearbeiten/erstellen:</label>
            <form action="<?=  base_url() . '/projects' ?>" method="post">
                <div class="form-group pb-2">
                    <label for="projectName" class="form-label">Projektname:</label>
                    <input type="text" class="form-control" id="projectName" placeholder="Projekt" name="projectName"
                    value="<?php
                        if (isset($name)) {
                            echo $name;
                        } else {
                            echo ' ';
                        }
                    ?>">
                </div>
                <div class="form-group pb-2">
                    <label for="projectDesc" class="form-label">Projektbeschreibung</label>
                    <textarea class="form-control mb-2" id="projectDesc" name="projectDescription">
                        <?php
                            if (isset($description)) {
                                echo $description;
                            }
                        ?>
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="save">Speichern</button>
                <button type="button" class="btn btn-info" name="reset">Reset</button>
            </form>
        </div>

    </div>

    <!-- free space on right side -->
    <div class="col-md-2"></div>

</div>

</body>
</html>