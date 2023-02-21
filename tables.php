<?php
include "layout/header.php";

?>
<div style=" width: 70%; margin: auto;">
    <h2>2022/23 EPL Season Table</h2>
    <?php

    $url = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSIve_Qno7ZVKDfN9MLeujECH0lgDlKlc0dQsJYfn2d-wCO-IBgsfO6ptorU-tXZ7iaPJkQIEnpYVii/pub?gid=0&single=true&output=csv";
    
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
    for($i = 1; $i < count($data); $i++) {

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


    function getData($url){
        $array = [];
        if (($handle = fopen($url, "r")) !== false) {
            while (($data = fgetcsv($handle, 92, ",")) !== false) {

                $array[] = $data;

            }
            fclose($handle);
            return $array;
        }
        else
            die("Problem reading csv");
    }

    ?>
</div>

<?php
include "layout/footer.php";
?>