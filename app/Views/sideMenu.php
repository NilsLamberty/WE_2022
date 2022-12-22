<!-- this file generates the side menu for each php page -->
<div class="col-md-2 pb-3">

    <ul class="list-group">
        <li class="list-group-item text-primary"><a href="<?= base_url() ?>" class="link-primary text-decoration-none">Login</a></li>
        <li class="list-group-item text-primary"><a href="<?= base_url() . "/projects" ?>" class="link-primary text-decoration-none">Projekte</a></li>
        <li class="list-group-item text-primary"><a href="<?= base_url() . "/todo" ?>" class="link-primary text-decoration-none">Aktuelles Projekt</a></li>
        <ul class="list-group ps-4">
            <li class="list-group-item text-primary"><a href="<?= base_url() . "/reiter" ?>" class="link-primary text-decoration-none">Reiter</a></li>
            <li class="list-group-item text-primary"><a href="<?= base_url() . "/exercises" ?>" class="link-primary text-decoration-none">Aufgaben</a></li>
            <li class="list-group-item text-primary"><a href="<?= base_url() . "/persons" ?>" class="link-primary text-decoration-none">Personen</a></li>
        </ul>
    </ul>

</div>