<?php
include "layout/header.php";

?>
<div style=" width: 70%; margin: auto;">
    <h2></h2>

    <form method="post">
        <select name="competitions">
            <option value="all">All Competitions</option>
            <option value="epl">English Premier League</option>
            <option value="ucl">UEFA Champions League</option>
        </select>
        <select name="season">
            <option value="s23">2022-23</option>
            <option value="s22">2021-22</option>
        </select>
        <input type="submit" value="Submit" name="submit">
    </form>


    <?php
    $epl22_23 = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSUQRlKDVZfBpigOrtJaCX1K05ySMjJe16LGGlmdyG5BhBa2d5mY1J9KByl10utiJFszJILYyBEDgLt/pub?gid=0&single=true&output=csv";
    $ucl22_23 = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSUQRlKDVZfBpigOrtJaCX1K05ySMjJe16LGGlmdyG5BhBa2d5mY1J9KByl10utiJFszJILYyBEDgLt/pub?gid=232218589&single=true&output=csv";

    if (isset($_POST['submit'])) {
        $competition = $_POST['competitions'];
        $season = $_POST['season'];

        if (strcmp($competition, "epl") === 0 and strcmp($season, "s23") === 0) {

            echo "<h1>English Premier League Season 2022/23</h1>";

            printTable($epl22_23);

        } else if (strcmp($competition, "ucl") === 0 and strcmp($season, "s23") === 0) {

            echo "<h1>UEFA Champions League Season 2022/23</h1>";
            printTable($ucl22_23);

        } else if (strcmp($competition, "all") === 0 and strcmp($season, "s23") === 0) {

            echo "<h1>English Premier League Season 2022/23</h1>";

            printTable($epl22_23);

            echo "<h1>UEFA Champions League Season 2022/23</h1>";

            printTable($ucl22_23);

        } else {
            echo 'Will be added soon...';
        }

    }


    function printTable($url)
    {
        echo "<table class=\"table\">
        <tr>
       <th>POSTION</th>
       <th>TEAM</th>
       <th>PLAYED</th>
       <th>WON</th>
       <th>DRAWN</th>
       <th>LOST</th>
       <th>GF</th>
       <th>GA</th>
       <th>GD</th>
       <th>Pts</th>
      </tr>";
        $data = getData($url);
        $i = 0;
        for ($i = 1; $i < count($data); $i++) {

            list($Pos, $Team, $Pld, $W, $D, $L, $GF, $GA, $GD, $Pts) = $data[$i];

            if (strcmp($Team, "Liverpool") === 0) {
                echo "<tr>
            <td><b>$Pos</b></td>
            <td><b>$Team</b></td>
            <td><b>$Pld</b></td>
            <td><b>$W</b></td>
            <td><b>$D</b></td>
            <td><b>$L</b></td>
            <td><b>$GF</b></td>
            <td><b>$GA</b></td>
            <td><b>$GD</b></td>
            <td><b>$Pts</b></td>
           </tr>";
            } else {
                echo "<tr>
            <td>$Pos</td>
            <td>$Team</td>
            <td>$Pld</td>
            <td>$W</td>
            <td>$D</td>
            <td>$L</td>
            <td>$GF</td>
            <td>$GA</td>
            <td>$GD</td>
            <td>$Pts</td>
           </tr>";
            }

        }
        echo "</table>";
    }

    function getData($url)
    {
        $array = [];
        if (($handle = fopen($url, "r")) !== false) {
            while (($data = fgetcsv($handle, 92, ",")) !== false) {

                $array[] = $data;

            }
            fclose($handle);
            return $array;
        } else
            die("Problem reading csv");
    }

    ?>
</div>

<?php
include "layout/footer.php";
?>