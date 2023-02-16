<?php
include "layout/header.php";

?>
<div style=" width: 70%; margin: auto;">
    <h2>2022/23 EPL Season Table</h2>
    <?php
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
    $data = file("assets/data/epl_table.csv");
    $i = 0;
    foreach ($data as $line) {

        $lineArray = explode(",", $line);

        if($i == 0){

            $i ++;
            continue;

        }

        list($Pos, $Team, $Pld, $W, $D, $L, $GF, $GA, $GD, $Pts) = $lineArray;

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

    ?>
</div>

<?php
include "layout/footer.php";
?>