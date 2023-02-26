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
?>