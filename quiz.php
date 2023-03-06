<?php
include 'layout/header.php';
?>

<div class="quiz-container">

    <h1 id="quiz-title">Do you know your club well?</h1>
    <?php
    include "assets/plugins/connect.php";

    $get_data = "SELECT * FROM `quiz`";
    $result = $con->query($get_data);
    if ($result->num_rows > 0) {

        echo '<form method="post" action="results.php" class="row g-3 align-items-center" onsubmit="return checkForm()">';

        while ($row = $result->fetch_assoc()) {

            echo "<h2>$row[question]</h2>
        <img src='assets\images\quiz\\$row[id].jpg' alt='$row[correct_answer]' width='70%' height='50%'>
        <div class=\"col-auto\">
        <input type=\"hidden\" name=\"question$row[id]\" value=\"$row[id]\">
    <input type=\"radio\" class=\"form-check-input\" name=\"answer$row[id]\" value=\"$row[option_1]\">$row[option_1]<br>
    <input type=\"radio\" class=\"form-check-input\" name=\"answer$row[id]\" value=\"$row[option_2]\">$row[option_2]<br>
    <input type=\"radio\" class=\"form-check-input\" name=\"answer$row[id]\" value=\"$row[option_3]\">$row[option_3]<br>
    <input type=\"radio\" class=\"form-check-input\" name=\"answer$row[id]\" value=\"$row[option_4]\">$row[option_4]<br>
</div>
";

        }
        $con->close();
        echo '<input type="submit" class="btn btn-outline-danger" value="SEE RESULTS" name="submit">';
        echo '</form>';

    }


    ?>
</div>


<?php
include 'layout/footer.php';
?>