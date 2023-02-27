<?php
    $title = "Poll Site";
    include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/header.php" ;
    //require_once 'assets/plugins/connect.php';
    include 'scripts/edem_functions.php';
    include 'assets/plugins/connect.php';
?>


<!-- Setting up all the necessary variables -->
<?php
    $userID = 5;
    $query = mysqli_query($con, "SELECT * FROM User WHERE user_id = $userID ");
    $row = mysqli_fetch_assoc($query);
    $username = $row['username'];
    echo "<br> HELLO <br>" ;
    echo var_dump($query);
    echo "<br> HELLO" ;
    var_dump($row['user_id']);
    echo "<br> HELLO" ;

    // Match Names Here
    $match1 = "Liverpool vs Real Madrid";
    $match2 = "Liverpool vs Chelsea";
    $match3 = "Liverpool vs Manchester Utd";
    $match4 = "Liverpool vs Everton";
    $match5 = "Liverpool vs Ghana";
?>


<h2><?php echo "User ". $username ." with the id number: ". $userID ?></h2>

<h2>Welcome <?php echo $username; ?> <br>
    Let us know what you think about these upcoming matches</h2>
    
    <hr>

<div class='table-responsive'>
    <form name='vote' method='post' action="scripts/poll_action.php">
        <table class='table caption-top table-info'>
            <caption>List of Upcoming Matches</caption>
            <tr><th>No.</th><th>Match</th><th>Stadium</th><th>Your Votes</th><th>Vote</th></tr>
            <tr><td>1</td><td><?php echo $match1 ?></td><td>Anfield</td><td><?php echo showVotes("match1") ?></td><td>
            <select name='match1'>
                <option value='null'selected>Choose</option>
                <option value='win'>Win</option>
                <option value='draw'>Draw</option>
                <option value='lose'>Lose</option>
            </select>
            </td></td></tr>
            <tr><td>2</td><td><?php echo $match2 ?></td><td>Hämeenlinna</td><td><?php echo showVotes("match2") ?></td><td>
                <select name='match2'>
                    <option value='null'selected>Choose</option>
                    <option value='win'>Win</option>
                    <option value='draw'>Draw</option>
                    <option value='lose'>Lose</option>
                </select>
            </td></tr>
            <tr><td>3</td><td><?php echo $match3 ?></td><td>Tampere</td><td><?php echo showVotes("match3") ?></td><td>
            <select name='match3'>
                <option value='null'selected>Choose</option>
                <option value='win'>Win</option>
                <option value='draw'>Draw</option>
                <option value='lose'>Lose</option>
            </select>
            </td></tr>
            <tr><td>4</td><td><?php echo $match4 ?></td><td>Oulu</td><td><?php echo showVotes("match4") ?></td><td>
            <select name='match4'>
                <option value='null'selected>Choose</option>
                <option value='win'>Win</option>
                <option value='draw'>Draw</option>
                <option value='lose'>Lose</option>
            </select>
            </td></tr>
            <tr><td>5</td><td><?php echo $match5 ?></td><td>Helsinki</td><td><?php echo showVotes("match5") ?></td><td>
            <select name='match5'>
                <option value='null'selected>Choose</option>
                <option value='win'>Win</option>
                <option value='draw'>Draw</option>
                <option value='lose'>Lose</option>
            </select>
            </td></tr>
        </table>
        <input type='submit' value='Submit Your Votes' name="submitVote" onclick="voteSuccess()">
        <input type='submit' value='Edit Your Votes' name='edit' onclick="editSuccess()">
        <input type='submit' value='Delete Your Votes' name='delete' onclick="deleteSuccess()"">
    </form>
</div>



<br>
<hr>
<?php 
    function confirmVotes1($matchNumber){
        global  $con, $userID;
        $result = mysqli_query($con, "SELECT * FROM poll WHERE user_id = $userID "); 
        $row = mysqli_fetch_assoc($result);
        
        if($row != false){
            echo "Error: VALUE EXISTS ALREADY ";
        }else{
            $match1Vote = $_POST['match1'];
            $match2Vote = $_POST['match2'];
            $match3Vote = $_POST['match3'];
            $match4Vote = $_POST['match4'];
            $match5Vote = $_POST['match5'];
            // include 'assets/plugins/connect.php';
            $insertSQL = "insert into poll(user_id, match1, match2, match3, match4, match5)
            values('$userID', '$match1Vote', '$match2Vote', '$match3Vote', '$match4Vote', '$match5Vote')" ;
        }
        
    }

?>

<table>
    <tr><th>Match</th><th>Your Votes</th></tr>
    <tr><td><?php echo $match1 ?></td><td><?php echo showVotes("match1") ?></td></tr>
    <tr><td><?php echo $match2 ?></td><td><?php echo showVotes("match2") ?></td></tr>
    <tr><td><?php echo $match3 ?></td><td><?php echo showVotes("match3") ?></td></tr>
    <tr><td><?php echo $match4 ?></td><td><?php echo showVotes("match4") ?></td></tr>
    <tr><td><?php echo $match5 ?></td><td><?php echo showVotes("match5") ?></td></tr>
</table>

<h2><?php echo $username." ". $match1 ?></h2>

<?php
    echo showVotes("match1") ;
?>

<br>
<hr>

<!-- Total Vote Results Table with variables inserted -->
<div id="results-table' class='table-responsive">
        <h2>VOTING TABLE (shows the votes that have been made)</h2>
        <table class="table caption-top table-danger">
        <caption>Total Vote Results</caption>
            <tr><th>No.</th><th>Match</th><th>Stadium</th><th>Win %</th><th>Draw %</th><th>Lose %</th><th>Total</th></tr>
            <!-- Match 1 Row-->
            <tr>
                <td>1</td><td>Liverpool vs Real Madrid</td><td>Anfield</td>
                <td><?php echo totalPercentage('win', 'match1') ?></td>
                <td><?php echo totalPercentage('draw', 'match1') ?></td>
                <td><?php echo totalPercentage('lose', 'match1') ?></td>
                <td><?php echo total('match1') ?></td>
            </tr>
            <!-- Match 2 Row-->
            <tr>
                <td>2</td><td>Liverpool vs Chelsea</td><td>Hämeenlinna</td>
                <td><?php echo totalPercentage('win', 'match2') ?></td>
                <td><?php echo totalPercentage('draw', 'match2') ?></td>
                <td><?php echo totalPercentage('lose', 'match2') ?></td
                ><td><?php echo total('match2') ?></td>
            </tr>
            <!-- Match 3 Row-->
            <tr>
                <td>3</td><td>Liverpool vs Manchester Utd</td><td>Tampere</td>
                <td><?php echo totalPercentage('win', 'match3') ?></td>
                <td><?php echo totalPercentage('draw', 'match3') ?></td>
                <td><?php echo totalPercentage('lose', 'match3') ?></td>
                <td><?php echo total('match3') ?></td>
            </tr>
            <!-- Match 4 Row-->
            <tr>
                <td>4</td><td>Liverpool vs Everton</td><td>Oulu</td>
                <td><?php echo totalPercentage('win', 'match4') ?></td>
                <td><?php echo totalPercentage('lose', 'match4') ?></td>
                <td><?php echo totalPercentage('draw', 'match4') ?></td>
                <td><?php echo total('match4') ?></td>
            </tr>
            <!-- Match 5 Row-->
            <tr>
                <td>5</td><td>Liverpool vs Ghana</td><td>Helsinki</td>
                <td><?php echo totalPercentage('win', 'match5') ?></td>
                <td><?php echo totalPercentage('draw', 'match5') ?></td>
                <td><?php echo totalPercentage('lose', 'match5') ?></td>
                <td><?php echo total('match5') ?></td>
            </tr>
        </table>
    </div>


<br>
<hr>


<?php include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/footer.php" ?>