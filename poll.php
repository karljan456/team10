<?php
$title = "Poll Site";
 include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/header.php" ;
 ?>


<!--New attempt at placing tables in the php tags -->

<?php
$username = "Edem";
$match1 = "Liverpool vs Real Madrid";
$match2 = "Liverpool vs Chelsea";
$match3 = "Liverpool vs Manchester Utd";
$match4 = "Liverpool vs Everton";
$match5 = "Liverpool vs Ghana";

    echo "
    <h2>Welcome $username <br>
    Let us know what you think about these upcoming matches</h2>
    
    <div class='table-responsive'>
        <form name='vote' method='post'>
            <table class='table caption-top table-info'>
                <caption>List of Upcoming Matches</caption>
                <tr><th>No.</th><th>Match</th><th>Stadium</th><th>Vote</th></tr>
                <tr><td>1</td><td>$match1</td><td>Anfield</td><td>
                <select name='match1'>
                    <option value='null'selected>Choose</option>
                    <option value='win'>Win</option>
                    <option value='draw'>Draw</option>
                    <option value='lose'>Lose</option>
                </select>
                </td></tr>
                <tr><td>2</td><td>$match2</td><td>Hämeenlinna</td><td>
                    <select name='match2'>
                        <option value='null'selected>Choose</option>
                        <option value='win'>Win</option>
                        <option value='draw'>Draw</option>
                        <option value='lose'>Lose</option>
                    </select>
                </td></tr>
                <tr><td>3</td><td>$match3</td><td>Tampere</td><td>
                <select name='match3'>
                    <option value='null'selected>Choose</option>
                    <option value='win'>Win</option>
                    <option value='draw'>Draw</option>
                    <option value='lose'>Lose</option>
                </select>
                </td></tr>
                <tr><td>4</td><td>$match4</td><td>Oulu</td><td>
                <select name='match4'>
                    <option value='null'selected>Choose</option>
                    <option value='win'>Win</option>
                    <option value='draw'>Draw</option>
                    <option value='lose'>Lose</option>
                </select>
                </td></tr>
                <tr><td>5</td><td>$match5</td><td>Helsinki</td><td>
                <select name='match5'>
                    <option value='null'selected>Choose</option>
                    <option value='win'>Win</option>
                    <option value='draw'>Draw</option>
                    <option value='lose'>Lose</option>
                </select>
                </td></tr>
            </table>
            <input type='submit' value='Submit Your Votes' name='submit'>
            <input type='submit' value='Edit Your Votes' name='edit'>
        </form>
    </div>

    ";
?>

<br>
<hr>
<div>
    <h2>Welcome USERNAME. <br>
    Let us know what you think about these up and coming matches</h2>
</div>

<div class="voting Table" style="background-color: blanchedalmond">
    <h2>VOTING TABLE</h2>
        <table class="table">
            <tr><th>No.</th><th>Match</th><th>Stadium</th><th>Vote</th></tr>
            <tr><td>1</td><td>Liverpool vs Real Madrid</td><td>Anfield</td><td>
                <form action="" name="vote" method="post">
                    <select  id="">
                        <option value="win">Win</option>
                        <option value="draw">Draw</option>
                        <option value="lose">Lose</option>
                        <option value="null" selected>VOTE</option>
                    </select>
                    <input type="submit" value="Submit Your Votes" name="submit" id="">
                </form>
            </td></tr>
            <tr><td>2</td><td>Liverpool vs Chelsea</td><td>Anfield</td><td>
                <select name="vote2" id="">
                    <option value="win">Win</option>
                    <option value="draw">Draw</option>
                    <option value="lose">Lose</option>
                    <option value="null" selected>VOTE</option>
                </select>
            </td></tr>
            <tr><td>3</td><td>Liverpool vs Manchester Utd</td><td>Anfield</td><td>
                <select name="vote3" id="">
                    <option value="win">Win</option>
                    <option value="draw">Draw</option>
                    <option value="lose">Lose</option>
                    <option value="null" selected>VOTE</option>
                </select>
            </td></tr>
            <tr><td>4</td><td>Liverpool vs Everton</td><td>Anfield</td><td>
                <select name="vote4" id="">
                    <option value="win">Win</option>
                    <option value="draw">Draw</option>
                    <option value="lose">Lose</option>
                    <option value="null" selected>VOTE</option>
                </select>
            </td></tr>
            <tr><td>5</td><td>Liverpool vs Ghana</td><td>Anfield</td><td>
                
                <select name="vote5" id="">
                    <option value="win">Win</option>
                    <option value="draw">Draw</option>
                    <option value="lose">Lose</option>                    
                    <option value="null" selected>VOTE</option>
                </select>
            </td></tr>
        </table>

    <form name="submit" method="post" action="">
        <input type="submit" value="Submit Your Votes" name="submit" id="">
        <input type="submit" value="Edit Your Votes" name="edit" id="">
    </form>
</div>

<br>
<br>
<div class="vote-results" style="background-color: aquamarine">
    <h2>VOTING TABLE (shows the votes that have been made)</h2>
    <table class="table">
        <tr><th>No.</th><th>Match</th><th>Stadium</th><th>Win %</th><th>Draw %</th><th>Lose %</th></tr>
        <tr><td>1</td><td>Liverpool vs Real Madrid</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td></tr>
        <tr><td>2</td><td>Liverpool vs Real Madrid</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td></tr>
        <tr><td>3</td><td>Liverpool vs Real Madrid</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td></tr>
        <tr><td>4</td><td>Liverpool vs Real Madrid</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td></tr>
        <tr><td>5</td><td>Liverpool vs Real Madrid</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td></tr>
    </table>
</div>

<?php
if(isset($_POST["submit"])){
    $vote = $_POST['vote'];
    include 'database.php';
    $sql = "insert into vote (vote)
    values('$vote')" ;

    if($conn->query($sql) === TRUE){
        echo "Your information has been added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>


<?php include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/footer.php" ?>