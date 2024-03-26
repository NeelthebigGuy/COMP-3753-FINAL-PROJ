<!DOCTYPE html>

<?php
    $con = mysqli_connect("localhost", "games_user", "Coltini", "games_db");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql_statement = "SELECT GPU_Name, Brand, Video_RAM_GB FROM GPUdetails";
    $result = mysqli_query($con, $sql_statement);
    //echo "Number of returned rows: " . mysqli_num_rows($result);
?>

<html>
    <head>
        <title>Welcome to the database page!</title>
        <link rel="stylesheet" href="css/main.css">
        <script src="https://kit.fontawesome.com/33c7d329d8.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
            <a href="index.php" class="backbutton">
                
                <i class="fa-solid fa-backward"></i>
                
            </a>
    
        <div class="center" style="margin-top: 40px;">
            <div class="container">
                <div class="mytitle">
                    <h1>GPU DATABASE </h1>
                </div>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>GPU Name</th>
                            <th>Brand</th>
                            <th>VRAM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['GPU_Name'] . "</td>";
                            echo "<td>" . $row['Brand'] .  "</td>";
                            echo "<td>" . $row['Video_RAM_GB'] .  "</td>";
                            echo "</tr>";
                        }
                        // Free result set
                        mysqli_free_result($result);
                        mysqli_close($con);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>