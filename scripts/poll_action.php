<?php 
    $title = "Poll Site";
    include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/header.php";
    include $_SERVER["DOCUMENT_ROOT"].'/team10/scripts/edem_functions.php';
    include $_SERVER["DOCUMENT_ROOT"].'/team10/assets/plugins/connect.php';
?>

<?php
    echo" <h1> Thank You for Voting </h1> ";
?>
<a href="../poll.php">
    <input type="button" onclick="voteSuccess()" value="Click here to return to the Voting Page">
</a>

<!-- Setting up all the necessary variables -->
<?php
    $userID = 5;

    // Match Names Here
    $match1 = "Liverpool vs Real Madrid";
    $match2 = "Liverpool vs Chelsea";
    $match3 = "Liverpool vs Manchester Utd";
    $match4 = "Liverpool vs Everton";
    $match5 = "Liverpool vs Ghana";
?>

<!-- Submitting to the database -->
<?php
     // if poll where user_ id = userID already exists, do nothing else Insert
     if(isset($_POST["submitVote"])){
        
        $match1Vote = $_POST['match1'];
        $match2Vote = $_POST['match2'];
        $match3Vote = $_POST['match3'];
        $match4Vote = $_POST['match4'];
        $match5Vote = $_POST['match5'];
        confirmVotes();
        // include 'assets/plugins/connect.php';
        $insertSQL = "insert into poll(user_id, match1, match2, match3, match4, match5)
        values('$userID', '$match1Vote', '$match2Vote', '$match3Vote', '$match4Vote', '$match5Vote')" ;
        
    }

    // if poll where user_ id = userID already exists, do nothing else Insert
    if(isset($_POST["submitVote1"])){
        $match1Vote = $_POST['match1'];
        $match2Vote = $_POST['match2'];
        $match3Vote = $_POST['match3'];
        $match4Vote = $_POST['match4'];
        $match5Vote = $_POST['match5'];
        // include 'assets/plugins/connect.php';
        $insertSQL = "insert into poll(user_id, match1, match2, match3, match4, match5)
        values('$userID', '$match1Vote', '$match2Vote', '$match3Vote', '$match4Vote', '$match5Vote')" ;
        //if there is already a value there, run the editing feature instead

        if($con->query($insertSQL) === TRUE){
            echo "<h1>Thank you for voting. <br>
            Your vote has been added successfully</h1>";
        }else{
            echo "Error: " . $con->error;
        }
        
    }

    //Editing the votes

    if(isset($_POST['edit'])){
        $match1Vote = $_POST['match1'];
        $match2Vote = $_POST['match2'];
        $match3Vote = $_POST['match3'];
        $match4Vote = $_POST['match4'];
        $match5Vote = $_POST['match5'];
        // include 'assets/plugins/connect.php';

        $alterQuery = mysqli_query($con, "UPDATE poll set match1='$match1Vote',
        match2='$match2Vote', match3='$match3Vote', match4='$match4Vote', match5='$match5Vote'
        WHERE user_id = '$userID'");

        if($alterQuery){
            echo "<h2> Thank you for voting. <br>
            Your information has been updated successfully</h2>";
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
        // include 'assets/plugins/connect.php';

        $alterQuery = mysqli_query($con, "DELETE FROM poll WHERE user_id = '$userID'"); 

        if($alterQuery){
            echo "<h2>Thank you for your time. <br>
            Your information has been deleted successfully</h2>";
        } else {
            echo"Record Not Modified";
        }
    }
?>


<?php include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/footer.php" ?>