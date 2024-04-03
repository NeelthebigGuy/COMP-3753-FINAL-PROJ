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
        <h1>Search By Game</h1>
    </div>
</div>

<div style="height: 20px;"></div>

<form method="POST">
    <div class="center">
        <div>
            <h3>Please enter the Video Game name</h3>
        
            <div class="center">
            <input list="GameNames" name="GameName" id="GameName" class="custominput">
            <datalist id="GameNames">
                <?php
                $getNames = mysqli_query($con, "SELECT DISTINCT Game_Name FROM Gamedetails ");
                while ($names = mysqli_fetch_array($getNames)) {
                    echo '<option value="' . $names['Game_Name'] . '"></option>';
                }
                mysqli_free_result($getNames);
                ?>
            </datalist>
            </div>
        </div>
        
        <div >
          <h3 style="margin-left: 20px;">Please Enter a Graphics Card Brand</h3>   
          <div class="center">
             <input list="GPUBrandNames" name="GPUBrandName" id="GPUBrandName" class="custominput">  
             <datalist id="GPUBrandNames">
                <?php
                $getGPUBrands = mysqli_query($con, "SELECT DISTINCT Brand FROM GPUdetails ");
                while ($GPUbrandNames = mysqli_fetch_array($getGPUBrands)) {
                    echo '<option value="' . $GPUbrandNames['Brand'] . '"></option>';
                }
                mysqli_free_result($getGPUBrands);
                ?>
             </datalist>
        </div>
     </div>

     <div >
          <h3 style="margin-left: 20px;">Please Enter a CPU Brand</h3>   
          <div class="center">
             <input list="CPUBrandNames" name="CPUBrandName" id="CPUBrandName" class="custominput">  
             <datalist id="CPUBrandNames">
                <?php
                $getCPUBrands = mysqli_query($con, "SELECT DISTINCT Brand FROM CPUdetails_1 ");
                while ($CPUbrandNames = mysqli_fetch_array($getCPUBrands)) {
                    echo '<option value="' . $CPUbrandNames['Brand'] . '"></option>';
                }
                mysqli_free_result($getCPUBrands);
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
    if (isset($_POST["GameName"]) && isset($_POST["GPUBrandName"]) && isset($_POST["CPUBrandName"])) {
        $gameName = $_POST["GameName"];
        $gpuBrand = $_POST["GPUBrandName"];
        $cpuBrand = $_POST["CPUBrandName"];
        //echo $gpuBrand;
        
        $gameMinGPUStr = mysqli_query($con, "SELECT DISTINCT Minimum_GPU_Str FROM Gamedetails WHERE Game_Name='$gameName'");
        $gameMinCPUStr = mysqli_query($con, "SELECT DISTINCT Min_CPU_Str FROM Gamedetails WHERE Game_Name='$gameName'");
        
        $toreadable = mysqli_fetch_array($gameMinGPUStr);
        $minGPUSTR = $toreadable[0];
        
        $gpuQ = "SELECT GPU_Name, Strength FROM GPUdetails WHERE Brand='$gpuBrand' AND Strength>'$minGPUSTR'";
        
        $toreadable2 = mysqli_fetch_array($gameMinCPUStr);
        $minCPUSTR = $toreadable2[0];
        $cpuQ = "SELECT CPU_Name, Strength FROM CPUdetails_1 WHERE Brand='$cpuBrand' AND Strength>'$minCPUSTR'";


        $gpus = mysqli_query($con, $gpuQ);
        $cpus = mysqli_query($con, $cpuQ);

       
       
        //echo '<div"><h3>Graphics cards that can run ' . $gameName . ':</h3></div>';
        echo '<div class="center">';
        echo '<div class="sleektable">';
        echo '<table>';
        echo '<tr><th colspan="2">' . $gpuBrand . ' Graphics cards that can run ' . $gameName . ':</th></tr>';
        while (($gpu = mysqli_fetch_array($gpus))) {
            echo '<tr><td>' . $gpu["GPU_Name"] . '</td><td>Strength: ' . $gpu["Strength"] . '</td></tr>';
        }
        echo '</table>';
        echo '</div>'; // Close GPU division
        mysqli_free_result($gameMinGPUStr);

        echo '<div class="sleektable">';
        echo '<table>';
        echo '<tr><th colspan="2">' . $cpuBrand . ' CPUs that can run ' . $gameName . ':</th></tr>';
        while ($cpu = mysqli_fetch_array($cpus)) {
            echo '<tr><td>' . $cpu["CPU_Name"] . '</td><td>Strength: ' . $cpu["Strength"] . '</td></tr>';
        }
        echo '</table>';
        echo '</div>'; // Close CPU division
        mysqli_free_result($gameMinCPUStr);

        echo '</div>'; // Close center division

    }
}
?>

</body>
</html>