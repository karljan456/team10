<?php 

    $query = "SELECT * FROM posts;";
    $queryResult= mysqli_query($con, $query); //run the sql query using the connection to db and the sql command stated above

    //let's play with the data

    //check how many rows of data
    if (mysqli_num_rows($queryResult) > 0){

        //if data rows found then loop it and do something with the data
        while($rows= mysqli_fetch_assoc($queryResult)){
            //do something e.g. display all data or some
            echo 
        }


    }
