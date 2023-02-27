<?php
    function total($matchNumber){
        global $con;
        $result = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM poll WHERE $matchNumber != 'null'") ;
        $row = mysqli_fetch_assoc($result);
        $total = $row["total"];
        return $total;
    }

    //Function to Calculate the percentage of VOTES. 
    function totalPercentage($vote, $matchNumber){
        //Using con as a global variable
        global $con;
        $result = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM poll WHERE $matchNumber != 'null' ") ;
        $row = mysqli_fetch_assoc($result);
        $total = $row["total"];
        //Simillar code as above but on one line
        $matchNumberTotal = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM poll WHERE $matchNumber = '$vote'"))['total'] ;
        
        $totalPercent = round((($matchNumberTotal/$total)*100), 1);
        return $totalPercent . "%";
    }

    function showVotes($matchNumber){
        global $userID, $con;
        $result = mysqli_query($con, "SELECT * FROM poll WHERE user_id = $userID "); 
        $row = mysqli_fetch_assoc($result);
        //IF statement to return value if the query result is null
        if($row != false){
            $votes = $row[$matchNumber];
        }else{
            $votes = " - ";
        }
        return $votes;
    }


    function confirmVotes(){
        global  $con, $userID;
        $result = mysqli_query($con, "SELECT * FROM poll WHERE user_id = $userID "); 
        $row = mysqli_fetch_assoc($result);
        
        if($row != false){
            echo "Error: VALUE EXISTS ALREADY ";
            exit();
        }else{
            $match1Vote = $_POST['match1'];
            $match2Vote = $_POST['match2'];
            $match3Vote = $_POST['match3'];
            $match4Vote = $_POST['match4'];
            $match5Vote = $_POST['match5'];
            // include 'assets/plugins/connect.php';
            $insertSQL = "insert into poll(user_id, match1, match2, match3, match4, match5)
            values('$userID', '$match1Vote', '$match2Vote', '$match3Vote', '$match4Vote', '$match5Vote')" ;
            if($con->query($insertSQL) === TRUE){
                echo "<h1>Thank you for voting. <br>
                Your vote has been added successfully</h1>";
            }else{
                echo "Error: " . $con->error;
            }
        }
        
    }


?>