<?php
    $title = "Poll Site";
    include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/header.php" ;
    //require_once 'assets/plugins/connect.php';
    include 'scripts/poll_functions.php';
    include 'assets/plugins/connect.php';
    //CONNECT THIS ID TO THE MAIN SESSION FROM THE LOGIN PAGE!!
    //$userID = $_SESSION['user_id_number'];
    $id = 5;
    $_SESSION['user_id_number'] = $id;
    ?>


<!-- Setting up all the necessary variables -->
<?php
    // Setting USER ID
    $userID = $id;
    $query = mysqli_query($con, "SELECT * FROM User WHERE user_id = $userID ");
    $row = mysqli_fetch_assoc($query);
    $username = $row['username'];
    
    // Match Names Here
    $match1 = "Liverpool vs Real Madrid";
    $match2 = "Liverpool vs Chelsea";
    $match3 = "Liverpool vs Manchester Utd";
    $match4 = "Liverpool vs Everton";
    $match5 = "Liverpool vs Ghana";
?>

<!-- Heading of the Table-->
<h5><?php echo "<strong>User :</strong> ". $row['fname'] . " " . $row['lname']. " (" . $username .")<br> <strong>ID No. :</strong> ". $userID ?></h5>
<hr>
<h2>Hello and welcome <u><em><?php echo $username; ?> (ID: <?php echo $userID; ?>)</em></u> <br>
    Let us know what you think about these upcoming matches</h2>
<hr>
<!-- Table of Upcoming Matches Showing -->
<div class='table-responsive'>
    <form name='vote' method='post' action="scripts/poll_action.php">
        <table class='table caption-top table-info'>
            <caption>List of Upcoming Matches</caption>
            <tr><th>No.</th><th>Match</th><th>Stadium</th><th>Your Votes</th><th>Vote</th></tr>
            <!-- Match 1 -->
            <tr><td>1</td><td><?php echo $match1 ?></td><td>Anfield</td><td><?php echo showVotes("match1") ?></td><td>
            <select name='match1'>
                <option value='null'selected>Choose</option>
                <option value='win'>Win</option>
                <option value='draw'>Draw</option>
                <option value='lose'>Lose</option>
            </select>
            </td></td></tr>
            <!-- Match 2 -->
            <tr><td>2</td><td><?php echo $match2 ?></td><td>Hämeenlinna</td><td><?php echo showVotes("match2") ?></td><td>
                <select name='match2'>
                    <option value='null'selected>Choose</option>
                    <option value='win'>Win</option>
                    <option value='draw'>Draw</option>
                    <option value='lose'>Lose</option>
                </select>
            </td></tr>
            <!-- Match 3 -->
            <tr><td>3</td><td><?php echo $match3 ?></td><td>Tampere</td><td><?php echo showVotes("match3") ?></td><td>
            <select name='match3'>
                <option value='null'selected>Choose</option>
                <option value='win'>Win</option>
                <option value='draw'>Draw</option>
                <option value='lose'>Lose</option>
            </select>
            </td></tr>
            <!-- Match 4 -->
            <tr><td>4</td><td><?php echo $match4 ?></td><td>Oulu</td><td><?php echo showVotes("match4") ?></td><td>
            <select name='match4'>
                <option value='null'selected>Choose</option>
                <option value='win'>Win</option>
                <option value='draw'>Draw</option>
                <option value='lose'>Lose</option>
            </select>
            </td></tr>
            <!-- Match 5 -->
            <tr><td>5</td><td><?php echo $match5 ?></td><td>Helsinki</td><td><?php echo showVotes("match5") ?></td><td>
            <select name='match5'>
                <option value='null'selected>Choose</option>
                <option value='win'>Win</option>
                <option value='draw'>Draw</option>
                <option value='lose'>Lose</option>
            </select>
            </td></tr>
        </table>
        <input type='submit' value='Submit Your Votes' name="submitVote">
        <input type='submit' value='Edit Your Votes' name='edit'>
        <input type='submit' value='Delete Your Votes' name='delete'>
    </form>
</div>

<br>
<hr>

<!-- Total Vote Results Table with variables inserted -->
<div id="results-table' class='table-responsive">
        <h2>VOTING TABLE (Shows The Votes That Have Been Made)</h2>
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