<!DOCTYPE html>

<?php
    $con = mysqli_connect("localhost", "games_user", "Coltini", "games_db");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql_statement = "SELECT vram, gpuName, price FROM gpu";
    $result = mysqli_query($con, $sql_statement);
    //echo "Number of returned rows: " . mysqli_num_rows($result);
?>

<html>
    <head>
        <title>Welcome to the database page!</title>
    </head>
    <body>
        <div class="container">
            <h1>My Contacts: </h1>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['vram'] . "</td>";
                        echo "<td>" . $row['gpuName'] .  "</td>";
                        echo "<td>" . $row['price'] .  "</td>";
                        echo "</tr>";
                    }
                    // Free result set
                    mysqli_free_result($result);
                    mysqli_close($con);
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>