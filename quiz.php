<?php
include 'layout/header.php';
?>
<h2>Do you know your club well?</h2>



<?php
include 'edvin_db.php';

$get_data = "SELECT * FROM `quiz`";
$result = $conn->query($get_data);
if ($result->num_rows > 0) {

    echo "<form method=\"post\">";

    while ($row = $result->fetch_assoc()) {

        echo "<h2>$row[question]</h2><br><br>
    <input type=\"radio\" name=\"answer\" value=\"$row[option_1]\">$row[option_1] <br>
    <input type=\"radio\" name=\"answer\" value=\"$row[option_2]\">$row[option_2] <br>
    <input type=\"radio\" name=\"answer\" value=\"$row[option_3]\">$row[option_3] <br>
    <input type=\"radio\" name=\"answer\" value=\"$row[option_4]\">$row[option_4] <br>";

    }
    // $conn->close();
    echo '<input type="submit" value="submit">';
    echo '</form>';


}




?>


<?php

include 'edvin_db.php';

if (isset($_POST['submit'])) {

    $points = 0;

    $check = "SELECT * FROM `quiz`";

    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $user_answer = $_POST['answer'];

            if (strcmp($user_answer,$row['correct_answer'] )   === 0 ) {
                $points++;
            }
        }
    }


    echo "<h1>Your score: $points/" . $result->num_rows . "</h1>";
    exit;

}

?>


<?php
include 'layout/footer.php';
?>