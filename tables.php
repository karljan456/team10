<?php
include "layout/header.php";

?>
<div class="tables" style=" width: 70%; margin: auto;">

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
    $epl22_23 = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSUQRlKDVZfBpigOrtJaCX1K05ySMjJe16LGGlmdyG5BhBa2d5mY1J9KByl10utiJFszJILYyBEDgLt/pub?gid=0&single=true&output=csv";
    $ucl22_23 = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSUQRlKDVZfBpigOrtJaCX1K05ySMjJe16LGGlmdyG5BhBa2d5mY1J9KByl10utiJFszJILYyBEDgLt/pub?gid=232218589&single=true&output=csv";
    if (isset($_POST['SHOW'])) {
        $competition = $_POST['competitions'];
        $season = $_POST['season'];

        // Displaying data for the current season 
        if (strcmp($competition, "epl") === 0 and strcmp($season, "s23") === 0) {

            echo "<img src=\"assets\images\\epl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
            echo "<h1>English Premier League Season 2022/23</h1>";
            printLiveTable($epl22_23, 'epl22_23');

        } else if (strcmp($competition, "ucl") === 0 and strcmp($season, "s23") === 0) {

            echo "<img src=\"assets\images\\ucl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
            echo "<h1>UEFA Champions League Season 2022/23</h1>";
            printLiveTable($ucl22_23, 'ucl22_23');

        } else if (strcmp($competition, "all") === 0 and strcmp($season, "s23") === 0) {

            echo "<img src=\"assets\images\\epl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
            echo "<h1>English Premier League Season 2022/23</h1>";

            printLiveTable($epl22_23, 'ucl22_23');

            echo "<img src=\"assets\images\\ucl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
            echo "<h1>UEFA Champions League Season 2022/23</h1>";

            printLiveTable($ucl22_23, 'ucl22_23');

        }
        // Displaying data for the previous season 
        else if (strcmp($competition, "epl") === 0 and strcmp($season, "s22") === 0) {

            echo "<img src=\"assets\images\\epl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
            echo "<h1>English Premier League Season 2021/22</h1>";

            printTable('epl21_22');

        } else if (strcmp($competition, "ucl") === 0 and strcmp($season, "s22") === 0) {

            echo "<img src=\"assets\images\\ucl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
            echo "<h1>UEFA Champions League Season 2021/22</h1>";

            printTable('ucl21_22');

        } else if (strcmp($competition, "all") === 0 and strcmp($season, "s22") === 0) {

            echo "<img src=\"assets\images\\epl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
            echo "<h1>English Premier League Season 2021/22</h1>";

            printTable('epl21_22');

            echo "<img src=\"assets\images\\ucl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
            echo "<h1>UEFA Champions League Season 2021/22</h1>";

            printTable('ucl21_22');

        }

    } else {
        echo "<img src=\"assets\images\\epl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
        echo "<h1>English Premier League Season 2022/23</h1>";

        printLiveTable($epl22_23, 'ucl22_23');

        echo "<img src=\"assets\images\\ucl_logo.png\" alt=\"epl logo\" align=\"right\" width=\"100\" height=\"70\">";
        echo "<h1>UEFA Champions League Season 2022/23</h1>";

        printLiveTable($ucl22_23, 'ucl22_23');

    }


    function printLiveTable($url, $table)
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
        // Going through the array with data 
        for ($i = 1; $i < count($data); $i++) {

            list($Pos, $Team, $Pld, $W, $D, $L, $GF, $GA, $GD, $Pts) = $data[$i];

            include 'edvin_db.php';

            // Putting the data into the database
            $insert = "INSERT INTO `" . $table . "` (`Pos`, `Team`, `Pld`, `W`, `D`, `L`, `GF`, `GA`, `GD`, `Pts`) VALUES ('$Pos', '$Team',
             '$Pld', '$W', '$D', '$L', '$GF', '$GA', '$GD', '$Pts')";

            if ($conn->query($insert) === TRUE) {
                // echo 'Data added!';
            } else {
                // die($conn->connect_error);
            }
        }

        printData($table, $conn);

        // Deleting data so it will be renewed with the newer one when it is available
        $delete = "DELETE FROM tables." . $table . "";

        mysqli_query($conn, $delete);

        $conn->close();
    }

    // reading online CSV file from the server
    function getData($url)
    {
        $array = [];
        if (($handle = fopen($url, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {

                $array[] = $data;

            }
            fclose($handle);
            return $array;
        } else
            die("Problem reading csv");
    }

    // Printing the data for the previous competitons 
    function printTable($table)
    {

        include 'edvin_db.php';
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
        printData($table, $conn);

        $conn->close();
    }

    // Printing the data from database 
    function printData($table, $conn)
    {
        // Getting data from the database and printing it out  
        $read = "SELECT * FROM `" . $table . "`";
        $result = $conn->query($read);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (strcmp($row['Team'], "Liverpool") === 0) {
                    echo "<tr>
                        <td><b>$row[Pos]</b></td>
                        <td><b>$row[Team]</b></td>
                        <td><b>$row[Pld]</b></td>
                        <td><b>$row[W]</b></td>
                        <td><b>$row[D]</b></td>
                        <td><b>$row[L]</b></td>
                        <td><b>$row[GF]</b></td>
                        <td><b>$row[GA]</b></td>
                        <td><b>$row[GD]</b></td>
                        <td><b>$row[Pts]</b></td>
                    </tr>
                </tbody>";
                } else {
                    echo "<tr>
                    <td>$row[Pos]</td>
                    <td>$row[Team]</td>
                    <td>$row[Pld]</td>
                    <td>$row[W]</td>
                    <td>$row[D]</td>
                    <td>$row[L]</td>
                    <td>$row[GF]</td>
                    <td>$row[GA]</td>
                    <td>$row[GD]</td>
                    <td>$row[Pts]</td>
                   </tr>";
                }
            }

            echo "</table>";

        } else {

            echo "No data to display";


        }
    }

    ?>
    </div>
</div>

<?php
include "layout/footer.php";
?>