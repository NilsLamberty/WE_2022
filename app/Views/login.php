<!-- main content -->
<!-- 2 col free space, 8 col content, 2 col free space -->
<div class="row pt-3">

    <div class="col-2"></div>

    <!-- login option -->
    <div class="col-8">
        <form>
            <div class="form-group pb-2">
                <label for="email">Email-Adresse:</label>
                <input type="email" class="form-control" id="email" placeholder="Email-Adresse eingeben">
            </div>
            <div class="form-group pb-2">
                <label for="pwd">Passwort</label>
                <input type="password" class="form-control" id="pwd" placeholder="Passwort">
            </div>
            <div class="form-check pb-2">
                <input class="form-check-input" type="checkbox" value="" id="ch">
                <label class="form-check-label" for="ch">AGBs und Datenschutzbedingung akzeptieren</label>
            </div>
            <button type="submit" class="btn btn-primary">Einloggen</button>
        </form>
        <p>Noch nicht registriert? <a href="#" class="link-primary text-decoration-none">Registrierung</a></p>
        <p>Da der Login Vorgang technisch noch nicht realisiert wurde: <a href="<?= base_url() . "/todo" ?>" class="link-primary text-decoration-none">Überspringen</a></p>
    </div>
    <div class="col-2"></div>
</div>
</body>
</html>