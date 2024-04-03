<!DOCTYPE html>
<html>
<head>
    <title>Welcome to the database page!</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/33c7d329d8.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
$con = mysqli_connect("localhost", "games_user", "Coltini", "games_db");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>

<a class="backbutton" href="index.php">
    <i class="fa-solid fa-backward" style="margin-top: 23%; margin-left: 20%"></i>
</a>

<div class="center" style="margin-top: 40px;">
    <div class="mytitle">
        <h1>See what Games are playable with your GPU & CPU</h1>
    </div>
</div>

<div style="height: 20px;"></div>

<form method="POST">
    <div class="center">
        <div>
            <h3>Please enter your Graphics Card Brand</h3>
        
            <div class="center">
            <input list="GPUBrands" name="GPUBrand" id="GPUBrand" class="custominput">
            <datalist id="GPUBrands">
                <?php
                $getBrands = mysqli_query($con, "SELECT DISTINCT Brand FROM GPUdetails");
                while ($brands = mysqli_fetch_array($getBrands)) {
                    echo '<option value="' . $brands['Brand'] . '"></option>';
                }
                mysqli_free_result($getBrands);
                ?>
            </datalist>
            </div>
        </div>
    </div>

    <div class="center">
        <div>
            <h3>Please enter your CPU Brand</h3>
            
            <div class="center">
                <input list="CPUBrands" name="CPUBrand" id="CPUBrand" class="custominput">
                <datalist id="CPUBrands">
                    <?php
                    $getBrands = mysqli_query($con, "SELECT DISTINCT Brand FROM CPUdetails_1");
                    while ($brands = mysqli_fetch_array($getBrands)) {
                        echo '<option value="' . $brands['Brand'] . '"></option>';
                    }
                    mysqli_free_result($getBrands);
                    ?>
                </datalist>
            </div>
        </div>
    </div>

    <div style="height: 10px;"></div>

    <div class="center">
        <input type="submit" style="margin-left: 5px;">
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["GPUBrand"]) && isset($_POST["CPUBrand"])) {
        $gpuBrand = $_POST["GPUBrand"];
        $cpuBrand = $_POST["CPUBrand"];

        // Fetch GPU names
        $gpuNamesQuery = mysqli_query($con, "SELECT GPU_Name FROM GPUdetails WHERE Brand='$gpuBrand'");
        $gpuNames = [];
        while ($gpu = mysqli_fetch_assoc($gpuNamesQuery)) {
            $gpuNames[] = $gpu['GPU_Name'];
        }

        // Fetch CPU names
        $cpuNamesQuery = mysqli_query($con, "SELECT CPU_Name FROM CPUdetails_1 WHERE Brand='$cpuBrand'");
        $cpuNames = [];
        while ($cpu = mysqli_fetch_assoc($cpuNamesQuery)) {
            $cpuNames[] = $cpu['CPU_Name'];
        }
    }
}
?>

<form>
<!-- Display GPU names -->
<?php if (!empty($gpuNames)): ?>
    <div class="center">
        <div>
        <h3>Please enter the name of your <?php echo $gpuBrand; ?> Branded GPU</h3>
            <div class="center">
                <input list="GPUNames" name="GPUName" id="GPUName" class="custominput">
                <datalist id="GPUNames">
                    <?php foreach ($gpuNames as $name): ?>
                        <option value="<?php echo $name; ?>"></option>
                    <?php endforeach; ?>
                </datalist>
            </div>
        </div>
    </div>
<?php endif; ?>




<!-- Display CPU names -->
<?php if (!empty($cpuNames)): ?>
    <div class="center">
        <div class="">
        <h3>Please enter the Name of your CPU</h3>
            <div class="center">
                <input list="CPUNames" name="CPUName" id="CPUName" class="custominput">
                <datalist id="CPUNames">
                    <?php foreach ($cpuNames as $name): ?>
                        <option value="<?php echo $name; ?>"></option>
                    <?php endforeach; ?>
                </datalist>
            </div>
        </div>
    </div>
    <div style="height: 10px;"></div>

    <div class="center">
        <input type="submit" style="margin-left: 5px;">
    </div>

<?php endif; ?>
</form>
<?php

        $GPUName = $_GET["GPUName"];
        $CPUName = $_GET["CPUName"];

        //  Converting to Strength INT
        $GPUStrengthQuery = mysqli_query($con,"SELECT DISTINCT Strength FROM GPUdetails WHERE GPU_Name='$GPUName'");
        $GPUStrength;         
        while($int = mysqli_fetch_assoc($GPUStrengthQuery)){
            $GPUStrength = $int['Strength'];
        }
        mysqli_free_result($GPUStrengthQuery);

        $CPUStrengthQuery = mysqli_query($con,"SELECT DISTINCT Strength FROM CPUdetails_1 WHERE CPU_Name='$CPUName'");
        $CPUStrength;         
        while($int = mysqli_fetch_assoc($CPUStrengthQuery)){
            $CPUStrength = $int['Strength'];
        }
        mysqli_free_result($CPUStrengthQuery);


        //  Fetch Games and GB
        $GameQuery = mysqli_query($con,"SELECT Game_Name,Space_Required_GB FROM Gamedetails WHERE Minimum_GPU_Str<'$GPUStrength' AND Min_CPU_Str<'$CPUStrength'");
        $GameNames = [];
        $GameGB = [];
        while ($games = mysqli_fetch_assoc($GameQuery)) {
            $GameNames[] = $games['Game_Name'];
            $GameGB[] = $games['Space_Required_GB'];
        }
        mysqli_free_result($GameQuery);

        

        //  Error checking
        $errors = [];
        //array_push($errors, "TEST");
?>

        <!--    PADDING -->
        <div style="height: 50px"></div>
            

        <!--    RESULTS     -->
    <?php if (!empty($GPUStrength)): ?>
        
        <div class="center">
            <div class="resultscontainers">
                <div class="resultscontainer">
                    <div class="resultTitle">Game Name</div>
                    <div>
                        <?php foreach ($GameNames as $name): ?>
                            <div class="result"><?php echo $name; ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="resultscontainer">
                    <div class="resultTitle">Space Required</div>
                    <div class="">
                        <?php foreach ($GameGB as $gb): ?>
                            <div class="result" style="text-align: right;"><?php echo $gb; ?> GB</div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>  
    
    <!--    ERRORS  -->
    <?php if (!empty($errors)): ?>
        <div> <?php echo count($errors) ?> Error(s) Found! </div>
    <?php endif; ?>  


<?php mysqli_close($con); /*    BYE :)  */ ?>
</body>
</html>
