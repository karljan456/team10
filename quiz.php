<?php
include 'layout/header.php';
?>

<div style=" width: 50%; margin: auto;">

    <h1>Do you know your club well?</h1>
    <?php
    include 'edvin_db.php';

    $get_data = "SELECT * FROM `quiz`";
    $result = $conn->query($get_data);
    if ($result->num_rows > 0) {

        echo '<form method="post" class="row g-3 align-items-center">';

        while ($row = $result->fetch_assoc()) {

            echo "<h2>$row[question]</h2>
        <img src='assets\images\quiz\\$row[id].jpg' alt='$row[correct_answer]' width='70%' height='50%'>
        <div class=\"col-auto\">
    <input type=\"radio\" class=\"form-check-input\" name=\"answer\" value=\"$row[option_1]\">$row[option_1]<br>
    <input type=\"radio\" class=\"form-check-input\" name=\"answer\" value=\"$row[option_2]\">$row[option_2]<br>
    <input type=\"radio\" class=\"form-check-input\" name=\"answer\" value=\"$row[option_3]\">$row[option_3]<br>
    <input type=\"radio\" class=\"form-check-input\" name=\"answer\" value=\"$row[option_4]\">$row[option_4]<br>
</div>
";

        }
        $conn->close();
        echo '<input type="submit" class="btn btn-outline-danger" value="CHECK" name="submit">';
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

                if ($user_answer == $row['correct_answer']) {
                    $points++;
                }
            }
        }


        echo "<h1>Your score: $points/" . $result->num_rows . "</h1>";
        
        $conn-> close();
    
    }

    ?>
</div>


<?php
include 'layout/footer.php';
?>