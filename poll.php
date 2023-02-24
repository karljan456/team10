<?php
$title = "Poll Site";
 include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/header.php" ;
$match1 = 1;
$match2 = 2;
$match3 = 3;
$match4 = 4;
$match5 = 5;
$a = $_GET['poll_id'];
include 'db.php';
$result = mysqli_query($con, "Select * from poll where id='$a' "  );
$row = mysqli_fetch_array($result);
 ?>


<!--Tables in php -->

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
    
    <hr>

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


<!-- Submitting to the database -->
<?php
if(isset($_POST["submit"])){
    $voter = '1234';
    $match1Vote = $_POST['match1'];
    $match2Vote = $_POST['match2'];
    $match3Vote = $_POST['match3'];
    $match4Vote = $_POST['match4'];
    $match5Vote = $_POST['match5'];
    include 'assets/plugins/connect.php';
    $sql = "insert into poll(user_id, match1, match2, match3, match4, match5)
    values('$voter', '$match1Vote', '$match2Vote', '$match3Vote', '$match4Vote', '$match5Vote')" ;

    if($con->query($sql) === TRUE){
        echo "Your information has been added successfully";
    }else{
        echo "Error: " . $con->error;
    }
}

?>
<!-- Editing the votes -->
<?php
    if(isset($_POST['edit'])){
        $voter = '1234';
        $match1Vote = $_POST['match1'];
        $match2Vote = $_POST['match2'];
        $match3Vote = $_POST['match3'];
        $match4Vote = $_POST['match4'];
        $match5Vote = $_POST['match5'];
        include 'assets/plugins/connect.php';

        $query = mysqli_query($con, "UPDATE poll set match1='$match1Vote',
        match2='$match2Vote', match3='$match3Vote', match4='$match4Vote', match5='$match5Vote' WHERE id ='$a' ");

        if($query){
            echo "<h2>Your information has been updated successfully</h2>";
        } else {
            echo"Record Not Modified";
        }


    }
?>

<br>
<hr>


<?php
    echo "
    <br>
    <br>
    <div class='table-responsive'>
        <h2>VOTING TABLE (shows the votes that have been made)</h2>
        <table class='table caption-top table-danger'>
        <caption>Total Vote Results</caption>
            <tr><th>No.</th><th>Match</th><th>Stadium</th><th>Win %</th><th>Draw %</th><th>Lose %</th><th>Total</th></tr>
            <tr><td>1</td><td>Liverpool vs Real Madrid</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td><td>Total</td></tr>
            <tr><td>2</td><td>Liverpool vs Chelsea</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td><td>Total</td></tr>
            <tr><td>3</td><td>Liverpool vs Manchester Utd</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td><td>Total</td></tr>
            <tr><td>4</td><td>Liverpool vs Everton</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td><td>Total</td></tr>
            <tr><td>5</td><td>Liverpool vs Ghana</td><td>Anfield</td><td>Win %</td><td>Draw %</td><td>Lose %</td><td>Total</td></tr>
        </table>
    </div>
    ";
?>


<?php 
    include 'assets/plugins/connect.php';
    $sql = "select * from studentinfo"; //add where id equals to 1234 - that is if you want to use the login info. 
    $result = $con->query($sql);
    echo "<br>";
    
?>


<br>
<hr>


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


<?php include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/footer.php" ?>