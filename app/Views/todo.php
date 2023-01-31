<div class="row p-3">

    <div class="col-md-1"></div>

    <!-- main content -->
    <div class="col-md-10">

        <!-- cards -->
        <div class="row">

            <?php

                $reiterModel = new \App\Models\ReiterModel();
                $reiter = $reiterModel -> getReiterInProject($currentProjectID);

                foreach ($reiter as $r) {
                    echo("
                        <div class='col'>
                            <div class='card'>
                                <div class='card-header'>" . $r["name"] ."</div>
                                <ul class='list-group list-group-flush'>");

                    $taskModel = new \App\Models\TasksModel();
                    $tasks = $taskModel -> getTasksOfReiter($r["id"]);
                    foreach ($tasks as $t) {
                        echo("<li class='list-group-item'>" . $t["name"] . "</li>");
                    }

                    echo ("     </ul>
                            </div>
                        </div>
                    ");
                }

            ?>

        </div>

    </div>

</div>

</body>
</html>