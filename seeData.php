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
        <link rel="stylesheet" href="main.css">
        <script src="https://kit.fontawesome.com/33c7d329d8.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <a class="backbutton" href="index.php">
                <i class="fa-solid fa-backward" style="margin-top: 23%; margin-left: 20%"></i>
        </a>
    
        <div class="center" style="margin-top: 40px;">
            <div class="mytitle">
                <h1>Dbelly stinky head</h1>
            </div>
        </div>


        <!--    PADDING     -->
        <div style="height: 20px;"></div>


        <div class="center">
            <h3>
                Please enter your Graphics Card Brand
            </h3>
        </div>

        <div class="center">
            <form>
                <input list="GPUBrands" name="GPUBrand" id="GPUBrand">
                <datalist id="GPUBrands">
                    <?php
                    
                    echo '<option value="TEST">hello</option>';
                    echo '<option value="TEST">hello</option>';
                    echo '<option value="TEST">hello</option>';

                    ?>
                </datalist>
            </form>
        </div>


    </body>
</html>