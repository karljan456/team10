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
        $totalResult = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM poll WHERE $matchNumber != 'null' ") ;
        $row = mysqli_fetch_assoc($totalResult);
        $total = $row["total"];
        //Simillar code as above but on one line
        //$matchNumberTotal = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM poll WHERE $matchNumber = '$vote'"))['total'] ;
        
        if($row==false){
            $totalPercent = " - empty";
        }else{
            $matchNumberTotalResult = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM poll WHERE $matchNumber = '$vote'");
            $matchNumberTotalRow = mysqli_fetch_assoc($matchNumberTotalResult);
            $matchNumberTotal = $matchNumberTotalRow['total'];
            
            //Return 0 if total is less than zero
            if($matchNumberTotal == 0){
                $totalPercent = 0;
            }elseif($matchNumberTotal > 0){
                $totalPercent = round((($matchNumberTotal/$total)*100), 1);
            }
        }
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

    //Function to check from the database if the user has already voted
    function confirmVotes(){
        global  $con, $userID;
        $result = mysqli_query($con, "SELECT * FROM poll WHERE user_id = $userID "); 
        $row = mysqli_fetch_assoc($result);
        
        if($row != false){
            echo "<strong>Error</strong>: You cannot vote twice. <br>
                    <strong>Tip</strong>: Try <strong>EDITING</strong> your vote instead. <br>
                    <em>Thank You</em>";
            echo " <script> votedAlready() </script>";
            echo " <br> <a href='../poll.php'>
                    <input type='button' value='Click here to return to the Voting Page'>
                </a>";
            exit();
        }

        
        
    }


?>