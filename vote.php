<?php
$title = "Poll Site";
 include $_SERVER["DOCUMENT_ROOT"]."/team10/layout/header.php" ;
 ?>

<div>
    <h2>Welcome USERNAME. <br>
    Let us know what you think about these up and coming matches</h2>
</div>

<div class="voting Table" style="background-color: blanchedalmond">
    <h2>VOTING TABLE</h2>
    
    <table class="table">
        <tr><th>No.</th><th>Match</th><th>Stadium</th><th>Vote</th></tr>
        <tr><td>1</td><td>Liverpool vs Real Madrid</td><td>Anfield</td><td>
            <form action="" name = "vote" method="post">
                <select name="vote" id="">
                    <option value="win">Win</option>
                    <option value="draw">Draw</option>
                    <option value="lose">Lose</option>
                    <option value="null" selected>VOTE</option>
                </select>
            </form>
        </td></tr>
        <tr><td>2</td><td>Liverpool vs Chelsea</td><td>Anfield</td><td>
            <form action="" name = "vote" method="post">
                <select name="vote" id="">
                    <option value="win">Win</option>
                    <option value="draw">Draw</option>
                    <option value="lose">Lose</option>
                    <option value="null" selected>VOTE</option>
                </select>
            </form>
        </td></tr>
        <tr><td>3</td><td>Liverpool vs Manchester Utd</td><td>Anfield</td><td>
            <form action="" name = "vote" method="post">
                <select name="vote" id="">
                    <option value="win">Win</option>
                    <option value="draw">Draw</option>
                    <option value="lose">Lose</option>
                    <option value="null" selected>VOTE</option>
                </select>
            </form>
        </td></tr>
        <tr><td>4</td><td>Liverpool vs Everton</td><td>Anfield</td><td>
            <form action="" name = "vote" method="post">
                <select name="vote" id="">
                    <option value="win">Win</option>
                    <option value="draw">Draw</option>
                    <option value="lose">Lose</option>
                    <option value="null" selected>VOTE</option>
                </select>
            </form>
        </td></tr>
        <tr><td>5</td><td>Liverpool vs Ghana</td><td>Anfield</td><td>
            <form action="" name = "vote" method="post">
                <select name="vote" id="">
                    <option value="win">Win</option>
                    <option value="draw">Draw</option>
                    <option value="lose">Lose</option>
                    <option value="null" selected>VOTE</option>
                </select>
            </form>
        </td></tr>
    </table>

    <form name = "update" method="post" action="">
        <input type="submit" value="Submit Your Votes" name="update" id="">
        <input type="submit" value="Edit Your Votes" name="edit" id="">
    </form>
</div>

<br><br>
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