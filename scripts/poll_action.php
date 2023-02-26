<!-- Submitting to the database -->
<?php
    // if poll where user_ id = userID already exists, do nothing else Insert

    if(isset($_POST["submitVote"])){
        //To prevent double insertion
        if($query == 'NULL'){
            echo "<h1>YOU HAVE ALREADY VOTED SO NO!</h1>";
        }else{
            echo "<h1>YOU HAVE NOT YET VOTED SO YES!</h1>";
            $match1Vote = $_POST['match1'];
            $match2Vote = $_POST['match2'];
            $match3Vote = $_POST['match3'];
            $match4Vote = $_POST['match4'];
            $match5Vote = $_POST['match5'];
            include 'assets/plugins/connect.php';
            $insertSQL = "insert into poll(user_id, match1, match2, match3, match4, match5)
            values('$userID', '$match1Vote', '$match2Vote', '$match3Vote', '$match4Vote', '$match5Vote')" ;

            if($con->query($insertSQL) === TRUE){
                echo "Your information has been added successfully";
            }else{
                echo "Error: " . $con->error;
            }
        }
    }

 //Editing the votes -->

    if(isset($_POST['edit'])){
        //$voter = '1234'; // CHANGE THIS TO USER ID DATA FROM LOGIN PAGE
        $match1Vote = $_POST['match1'];
        $match2Vote = $_POST['match2'];
        $match3Vote = $_POST['match3'];
        $match4Vote = $_POST['match4'];
        $match5Vote = $_POST['match5'];
        include 'assets/plugins/connect.php';

        $alterQuery = mysqli_query($con, "UPDATE poll set match1='$match1Vote',
        match2='$match2Vote', match3='$match3Vote', match4='$match4Vote', match5='$match5Vote' 

        /* CHANGE THE USER_ID TO THE VARIABLE */
        WHERE user_id = '$userID'"); 

        if($alterQuery){
            echo "<h2>Your information has been updated successfully</h2>";
        } else {
            echo"Record Not Modified";
        }
    }

    //Deleting the votes -->

    if(isset($_POST['delete'])){
        $match1Vote = $_POST['match1'];
        $match2Vote = $_POST['match2'];
        $match3Vote = $_POST['match3'];
        $match4Vote = $_POST['match4'];
        $match5Vote = $_POST['match5'];
        include 'assets/plugins/connect.php';

        $alterQuery = mysqli_query($con, "DELETE FROM poll WHERE user_id = '$userID'"); 

        if($alterQuery){
            echo "<h2>Your information has been deleted successfully</h2>";
        } else {
            echo"Record Not Modified";
        }
    }
?>