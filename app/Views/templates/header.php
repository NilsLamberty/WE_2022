<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script>
        function deletePerson() {
            let del = confirm("Soll die Person gelöscht werden?");
            if (del === false) {
                const element = document.getElementById("email");
                element.value = "";
            }
        }

        function deleteProject() {
            let del = confirm("Soll das Projekt gelöscht werden?");
            if (del === false) {
                const element = document.getElementById("selectProject");
                element.innerHTML = "";
            }
        }

        function deleteReiter() {
            let del = confirm("Soll der Reiter gelöscht werden?");
            if (del === false) {
                const element = document.getElementById("reiterIDValue")
                element.value = "-1";
            }
        }

        function deleteTask() {
            let del = confirm("Soll die Aufgabe gelöscht werden?");
            if (del === false) {
                const element = document.getElementById("taskIDValue");
                element.value = "-1";
            }
        }
    </script>

</head>
<body>

<!-- header container -->
<div class="container-fluid p-5 bg-light mb-3">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class="text">Aufgabenplaner: <?= $title ?></h1>
        </div>
    </div>
</div>