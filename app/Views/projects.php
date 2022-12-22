<div class="row p-3">

    <!-- side menu -->
    <? include ("sideMenu.php"); ?>

    <div class="col-md-8">

        <!-- select option -->
        <div class="row pb-2">
            <label class="form-label form-header">Projekt Auswählen</label>
            <form>
                <select class="form-select mb-2">
                    <option selected>- bitte auswählen - </option>
                </select>
                <button type="button" class="btn btn-primary">Auswählen</button>
                <button type="button" class="btn btn-primary">Bearbeiten</button>
                <button type="button" class="btn btn-danger">Löschen</button>
            </form>
        </div>

        <!-- edit option -->
        <div class="row">
            <label class="form-label form-header">Projekt bearbeiten/erstellen:</label>
            <form>
                <div class="form-group pb-2">
                    <label for="projectName" class="form-label">Projektname:</label>
                    <input type="text" class="form-control" id="projectName" placeholder="Projekt" name="projectName">
                </div>
                <div class="form-group pb-2">
                    <label for="projectDesc" class="form-label">Projektbeschreibung</label>
                    <textarea class="form-control mb-2" id="projectDesc" placeholder="Beschreibung"></textarea>
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