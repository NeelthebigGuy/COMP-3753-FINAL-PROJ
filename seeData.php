<!DOCTYPE html>

<?php
    $con = mysqli_connect("localhost", "games_user", "Coltini", "games_db");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
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
                <h1>See what Games are playable with your GPU & CPU</h1>
            </div>
        </div>


        <!--    PADDING     -->
        <div style="height: 20px;"></div>


        <!--    PADDING     -->
        <div style="height: 20px;"></div>

        <!--    SEARCH BAR  -->
        <?php
            echo '<div class="container">';
                echo '<div>';
                    //  title
                    echo '<div class="center">';
                        echo '<h3>Please enter your Graphics Card Brand</h3>';
                    echo '</div>';

                    //  selection, options and form
                    echo '<div class="center">';
                        echo '<form method="POST">';
                            echo '<input list="GPUBrands" name="GPUBrand" id="GPUBrand" class="custominput">';
                            echo '<datalist id="GPUBrands">';
                                //  GetBrand names from GPU table
                                $getBrands = mysqli_query($con, "SELECT DISTINCT Brand FROM GPUdetails");
            
                                while($brands = mysqli_fetch_array($getBrands)){
                                    echo '<option value="' . $brands['Brand'] .'"></option>';
                                    }
                                mysqli_free_result($getBrands);
                            echo '</datalist>';
                            echo '<input type="submit" style="margin-left: 5px;">';
                        echo '</form>';
                    echo '</div>';

                echo '</div>';

                echo '<div>';
                    //  title
                    echo '<div class="center">';
                        echo '<h3>Please enter your Graphics Card Brand</h3>';
                    echo '</div>';

                    //  selection, options and form
                    echo '<div class="center">';
                        echo '<form method="POST">';
                            echo '<input list="GPUBrands" name="GPUBrand" id="GPUBrand" class="custominput">';
                            echo '<datalist id="GPUBrands">';
                                //  GetBrand names from GPU table
                                $getBrands = mysqli_query($con, "SELECT DISTINCT Brand FROM GPUdetails");
            
                                while($brands = mysqli_fetch_array($getBrands)){
                                    echo '<option value="' . $brands['Brand'] .'"></option>';
                                    }
                                mysqli_free_result($getBrands);
                            echo '</datalist>';
                            echo '<input type="submit" style="margin-left: 5px;">';
                        echo '</form>';
                    echo '</div>';

                echo '</div>';
            echo '</div>';
        
        ?>

               


        <!-- PADDING -->
        <div style="height: 75px;"></div>

        <!--    SEARCH BAR RESULTS  *GPU NAME  -->
            <?php 
            if(isset($_POST["GPUBrand"])){
                $brandName = $_POST["GPUBrand"];

                //  Check for no result (Returns empty string)
                if ($brandName != ''){
                    //GetName Title
                    echo '<div class="center">';
                        echo '<h3>Please enter the name of your '. $brandName .' Branded GPU</h3>';
                    echo '</div>';

                    //GetName Form, Datalist and options
                    echo '<div class="center">';
                        echo '<form method="POST">';
                            echo '<input list="GPUNames" name="GPUName" id="GPUName" class="custominput">';
                            echo '<datalist id="GPUNames">';
                                $sqlNames = "SELECT GPU_Name FROM GPUdetails WHERE Brand='". $brandName ."'";
                                $getNames = mysqli_query($con, $sqlNames);
                                while($names = mysqli_fetch_array($getNames)){
                                    echo '<option value="' . $names['GPU_Name'] .'"></option>';
                                }
                                mysqli_free_result($getNames);
                            echo '</datalist>';
                            echo '<input type="submit" style="margin-left: 5px;">';
                        echo '</form>';
                    echo '</div>';

                }
            }
            ?>




            <!--    SEARCH BAR RESULTS  *CPU BRAND   -->
                <?php 
                if(isset($_POST["GPUName"])){
                    $cardName = $_POST["GPUName"];

                    //  Check for no result (Returns empty string)
                    if ($cardName != ''){
                        //GetName Title
                        echo '<div class="center">';
                            echo '<h3>Please enter the Brand of your CPU</h3>';
                        echo '</div>';

                        //getCPU Brand Form, Datalist and options
                        echo '<div class="center">';
                            echo '<form method="POST">';
                                echo '<input list="CPUBrands" name="CPUBrand" id="CPUBrand" class="custominput">';
                                echo '<datalist id="CPUBrands">';

                                    $getBrands = mysqli_query($con, "SELECT DISTINCT Brand FROM CPUdetails_1");
        
                                    while($brands = mysqli_fetch_array($getBrands)){
                                        echo '<option value="' . $brands['Brand'] .'"></option>';
                                        }
                                    mysqli_free_result($getBrands);

                                echo '</datalist>';
                                echo '<input type="submit" style="margin-left: 5px;">';
                            echo '</form>';
                        echo '</div>';

                    }
                }
                ?>


    </body>
</html>