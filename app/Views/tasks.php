<div class="row p-3">

    <!-- side menu -->
    <? include ("sideMenu.php"); ?>

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
                <?php include ("tables/tableExercises.php"); ?>
                </tbody>
            </table>
        </div>

        <!-- edit option -->
        <div class="row pb-2">
            <label class="form-label form-header">Bearbeiten/Erstellen</label>
            <form>
                <div class="form-group pb-2">
                    <label for="exerciseName" class="form-label">Aufgabenbezeichnung:</label>
                    <input type="text" class="form-control" id="exerciseName" placeholder="Aufgabe">
                </div>
                <div class="form-group pb-2">
                    <label for="exerciseDesc" class="form-label">Beschreibung der Aufgabe:</label>
                    <textarea class="form-control" id="exerciseDesc" placeholder="Beschreibung"></textarea>
                </div>
                <div class="form-group pb-2">
                    <label for="creationDate" class="form-label">Erstellungsdatum:</label>
                    <input type="text" class="form-control" id="creationDate" placeholder="01.01.19">
                </div>
                <div class="form-group pb-2">
                    <label for="dueDate" class="form-label">fällig bis:</label>
                    <input type="text" class="form-control" id="dueDate" placeholder="01.01.19">
                </div>
                <div class="form-group pb-2">
                    <label for="selectRider" class="form-label">Aufgabenbezeichnung:</label>
                    <select class="form-select" id="selectRider">
                        <option selected>ToDo</option>
                        <option>Erledigt</option>
                        <option>Verschoben</option>
                    </select>
                </div>
                <div class="form-group pb-2">
                    <label for="personSelect" class="form-label">Aufgabenbezeichnung:</label>
                    <select class="form-select" id="personSelect">
                        <option selected>Max Mustermann</option>
                        <option>Petra Müller</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary">Speichern</button>
                <button type="button" class="btn btn-info">Reset</button>
            </form>
        </div>

    </div>

    <!-- free space on right side -->
    <div class="col-md-2"></div>

</div>

</body>
</html>