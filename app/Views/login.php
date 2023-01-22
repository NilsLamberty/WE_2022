<!-- main content -->
<!-- 2 col free space, 8 col content, 2 col free space -->
<div class="row pt-3">

    <div class="col-2"></div>

    <!-- login option -->
    <div class="col-8">
        <form action="<?php base_url() ?>" method="post">
            <div class="form-group pb-2">
                <label for="email">Email-Adresse:</label>
                <input type="email" class="form-control <?=(isset($error['mail'])) ? 'is-invalid' : '' ?>" id="email" placeholder="Email-Adresse eingeben" name="mail"
                value="<?= $_POST['mail'] ?? '';?>">
                <div class="invalid-feedback">
                    <?= (isset($error['mail'])) ? $error['mail'] : '' ?>
                </div>
            </div>
            <div class="form-group pb-2">
                <label for="pwd">Passwort</label>
                <input type="password" class="form-control <?=(isset($error['password'])) ? 'is-invalid' : '' ?>" id="pwd" placeholder="Passwort" name="password">
                <div class="invalid-feedback">
                    <?= (isset($error['password'])) ? $error['password'] : ''?>
                </div>
            </div>
            <div class="form-check pb-2">
                <input class="form-check-input <?=(isset($error['agb'])) ? 'is-invalid' : '' ?>" type="checkbox" value="agb" id="ch" name="agb">
                <label class="form-check-label" for="ch">AGBs und Datenschutzbedingung akzeptieren</label>
                <div class="invalid-feedback">
                    <?= (isset($error['agb'])) ? $error['agb'] : ''?>

                </div>
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