<?php
include 'layout/header.php';
?>

<div class="check-quiz-container">

    <?php
    include 'scripts/check_quiz.php';
    ?>


    <?php

    switch ($points) {


        case 10:

            echo '<img src="assets\images\gif\best_score.gif" alt="best_score">';

            break;

        case 9:
        case 8:

            echo '<img src="assets\images\gif\good.gif" alt="good_score">';

            break;

        case 7:
        case 6:

            echo '<img src="assets\images\gif\ok.gif" alt="ok_score">';

            break;

        case 5:
        case 4:
        case 3:
        case 2:
        case 1:
        case 0:

            echo '<img src="assets\images\gif\really.gif" alt="low_score">';
            
            break;

    }

    ?>


</div>

<?php
include 'layout/footer.php';
?>