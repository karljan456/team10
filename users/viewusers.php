<?php
include_once "assets/plugins/connect.php";

// Read data from the MySQL database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Display the data in a table
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

// Close the MySQL connection
mysqli_close($conn);
?>
