<div class="row p-3">

    <!-- side menu -->
    <? include ("sideMenu.php"); ?>

    <div class="col-md-8">

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
                <?php include ("tables/tableReiter.php"); ?>
                </tbody>
            </table>
        </div>

        <!-- edit option -->
        <div class="row pb-2">
            <label class="form-label form-header">Bearbeiten/Erstellen</label>
            <form>
                <div class="form-group pb-2">
                    <label for="riderName" class="form-label">Bezeichnung des Reiters:</label>
                    <input type="text" class="form-control" id="riderName" placeholder="Reiter">
                </div>
                <div class="form-group pb-2">
                    <label for="riderDesc" class="form-label">Beschreibung</label>
                    <textarea class="form-control" id="riderDesc" placeholder="Beschreibung"></textarea>
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