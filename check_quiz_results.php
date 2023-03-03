<?php
include 'layout/header.php';
?>

<div style="width:50%; margin: auto;">

    <?php

    include 'edvin_db.php';

    if (isset($_POST['submit'])) {

        $points = 0;
        $total_questions = 5;
        $user_answers = array();

        // Looping through every question in the quiz
        for ($i = 1; $i <= $total_questions; $i++) {
            // Retrieving the user answer for this question from $_POST
            $user_answer = $_POST['answer' . $i];
            $user_answers[$i] = $user_answer;

            $check = "SELECT correct_answer FROM `quiz` WHERE id = $i";

            // Executing the query and retrieving the result set
            $result = $conn->query($check);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $correct_answer = $row['correct_answer'];

                // Check if the user answer is correct and increase the score if it is
                if ($user_answer == $correct_answer) {
                    $points++;
                }
            }
        }

        echo "<h2>Your score is: $points/" . $total_questions . "</h2>";

        $conn->close();

    }

    ?>

</div>

<?php
include 'layout/footer.php';
?>