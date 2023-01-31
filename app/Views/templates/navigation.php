<nav class="navbar navbar-expand-lg navbar-light bg-light ps-4">
    <a class="navbar-brand" href="<?= base_url() . '/projects' ?>">Projekte</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
<!--            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php

                        if ($_SESSION["projectID"] != null) {
                            $projectModel = new \App\Models\ProjectsModel();
                            $name = $projectModel -> getProjectName($_SESSION["projectID"]);
                            echo $name["name"];
                        }
                        else {
                            echo "Projekt auswählen";
                        }

                    ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php

                        if ($_SESSION["projectID"] != null) {
                            $reiter = base_url() . "/reiter";
                            echo "<a class='dropdown-item link-primary text-decoration-none' href='" . $reiter . "'>Reiter</a>";
                            $tasks = base_url() . "/tasks";
                            echo "<a class='dropdown-item link-primary text-decoration-none' href='" . $tasks . "'>Aufgaben</a>";
                            $persons = base_url() . "/persons";
                            echo "<a class='dropdown-item link-primary text-decoration-none' href='" . $persons . "'>Personen</a>";
                        }

                    ?>
                </div>
            </li>
        </ul>
    </div>
    <a type="button" class="btn btn-primary me-2" href="<?= base_url() ?>">Logout</a>
</nav>