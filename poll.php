<?php
    $title = "Poll Site";
    include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/header.php" ;
    //require_once 'assets/plugins/connect.php';
    include 'scripts/poll_functions.php';
    include 'scripts/functions.php';
    include 'assets/plugins/connect.php';
    ?>

<!-- Setting up all the necessary variables -->
<?php
    // Setting USERNAME
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }else{
        $username = "guest";
    }

    $query = "SELECT * FROM users WHERE username = '$username' ";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $username = $row['username'];
            $fname = $row['fname'];
            $lname = $row['lname'];
    
            // Match Names Here
            $match1 = "Liverpool vs Real Madrid";
            $match2 = "Liverpool vs Chelsea";
            $match3 = "Liverpool vs Manchester Utd";
            $match4 = "Liverpool vs Everton";
            $match5 = "Liverpool vs Ghana";
        }
    }else{
        // Display LogIn prompt
        $_SESSION['message'] = "You need to be logged in to vote" ;
        include 'scripts/messages.php';
    }
?>

<?php
    // START OF IF STATEMENT 
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];

        // IF statement break--- continues on after table ends
?>

<!-- Heading of the Table-->
<h2>Hello and welcome <?php echo $fname . " " . $lname ?> <u><em>(<?php echo $username; ?>)</em></u></h2>
<h3>Let us know what you think about these upcoming matches</h3>
<hr>
<!-- Table of Upcoming Matches Showing -->
<div class='table-responsive'>
    <form name='vote' method='post' action="scripts/poll_action.php">
        <table class='table caption-top table-info text-dark'>
            <caption>List of Upcoming Matches</caption>
            <tr><th class="text-dark">No.</th><th class="text-dark">Match</th><th class="text-dark">Stadium</th><th class="text-dark">Your Votes</th><th class="text-dark">Vote</th></tr>
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
        <input class="btn btn-success" type='submit' value='Submit Your Votes' name="submitVote">
        <input class="btn btn-warning" type='submit' value='Edit Your Votes' name='edit'>
        <input class="btn btn-danger" type='submit' value='Delete Your Votes' name='delete'>
    </form>
</div>

<?php
    // IF statement continues from here 
    }else{
        login();
    }
?>

<br>
<hr>

<!-- Total Vote Results Table with variables inserted -->
<div id="results-table' class='table-responsive">
        <h2>VOTING RESULTS TABLE (Shows The Votes That Have Been Made By Other Users)</h2>
        <table class="table caption-top table-danger">
        <caption>Total Vote Results</caption>
            <tr><th class="text-dark">No.</th><th class="text-dark">Match</th><th class="text-dark">Stadium</th><th class="text-dark">Win %</th><th class="text-dark">Draw %</th><th class="text-dark">Lose %</th><th class="text-dark">Total</th></tr>
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

<?php include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/trophies.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/footer.php" ?>