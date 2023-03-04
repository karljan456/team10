<?php
include "layout/header.php";

?>

<div class="tables">

    <form method="post" class="row g-3">
        <div class="col-auto">
            <select name="competitions" class="form-select">
                <option value="all">All Competitions</option>
                <option value="epl">English Premier League</option>
                <option value="ucl">UEFA Champions League</option>
            </select>
        </div>
        <div class="col-auto">
            <select name="season" class="form-select">
                <option value="s23">2022-23</option>
                <option value="s22">2021-22</option>
            </select>
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-outline-danger" value="SHOW" name="SHOW">
        </div>
    </form>
    <div>
        <?php

        include 'scripts/functions.php';

        $epl22_23 = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSUQRlKDVZfBpigOrtJaCX1K05ySMjJe16LGGlmdyG5BhBa2d5mY1J9KByl10utiJFszJILYyBEDgLt/pub?gid=0&single=true&output=csv";
        $ucl22_23 = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSUQRlKDVZfBpigOrtJaCX1K05ySMjJe16LGGlmdyG5BhBa2d5mY1J9KByl10utiJFszJILYyBEDgLt/pub?gid=232218589&single=true&output=csv";
        if (isset($_POST['SHOW'])) {
            $competition = $_POST['competitions'];
            $season = $_POST['season'];

            // Displaying data for the current season 
            if (strcmp($competition, "epl") === 0 and strcmp($season, "s23") === 0) {

                printEplLogo();

                printEpl("s23");

                printLiveTable($epl22_23, 'epl22_23');

            } else if (strcmp($competition, "ucl") === 0 and strcmp($season, "s23") === 0) {

                printUclLogo();
                printUcl("s23");
                printLiveTable($ucl22_23, 'ucl22_23');

            } else if (strcmp($competition, "all") === 0 and strcmp($season, "s23") === 0) {

                printEplLogo();
                printEpl("s23");
                printLiveTable($epl22_23, 'ucl22_23');

                printUclLogo();
                printUcl("s23");

                printLiveTable($ucl22_23, 'ucl22_23');

            }
            // Displaying data for the previous season 
            else if (strcmp($competition, "epl") === 0 and strcmp($season, "s22") === 0) {

                printEplLogo();
                printEpl("s22");

                printTable('epl21_22');

            } else if (strcmp($competition, "ucl") === 0 and strcmp($season, "s22") === 0) {

                printUclLogo();
                printUcl("s22");

                printTable('ucl21_22');

            } else if (strcmp($competition, "all") === 0 and strcmp($season, "s22") === 0) {

                printEplLogo();
                printEpl("s22");

                printTable('epl21_22');

                printUclLogo();
                printUcl("s22");

                printTable('ucl21_22');

            }

        } else {
            printEplLogo();
            printEpl("s23");

            printLiveTable($epl22_23, 'ucl22_23');

            printUclLogo();

            printUcl("s23");

            printLiveTable($ucl22_23, 'ucl22_23');

        }
        ?>
    </div>
</div>

<?php
include "layout/footer.php";
?>