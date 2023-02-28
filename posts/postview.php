<?php
include "../assets/plugins/connect.php";
include "../layout/header.php";
?>


<table class="justify-content-center my-3 post-view-table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>excerpt</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $query = "SELECT * FROM posts;";
        $queryResult = mysqli_query($con, $query); //run the sql query using the connection to db and the sql command stated above

        //let's play with the data

        //check how many rows of data
        if (mysqli_num_rows($queryResult) > 0) {

            //if data rows found then loop it and do something with the data
            while ($article = mysqli_fetch_assoc($queryResult)) {
                
        ?>
                <tr>
                    <td><?= $article['id']; ?></td>
                    <td><?= $article['title']; ?></td>
                    <td><?= $article['excerpt']; ?></td>
                    <td><?= $article['author']; ?></td>
                    <td>
                        <a href="postview.php?id=<?= $article['id']; ?>" class="btn btn-info btn-sm">View</a>
                        <a href="postedit.php?id=<?= $article['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                        <form action="code.php" method="POST" class="d-inline">
                            <button type="submit" name="delete_article" value="<?= $article['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
        <?php
                //do something e.g. display all data or some
                echo $article['id'];
            }
        } else {
            echo '<strong>Sadly, No Articles Found</strong>.' . ' <a href="createpost.php" target=_Blank>Create A New Article?</a>';
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
    </tbody>


</table>

<?php include "../layout/footer.php"; ?>