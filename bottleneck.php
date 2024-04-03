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
        <h1>Check If your CPU Bottleneck's your GPU</h1>
    </div>
</div>

<div style="height: 20px;"></div>

<form method="POST">
    <div class="center">
        <div>
            <h3>Please enter the Graphics Card Name</h3>
        
            <div class="center">
            <input list="GPUNames" name="GPUName" id="GameName" class="custominput">
            <datalist id="GPUNames">
                <?php
                $getNames = mysqli_query($con, "SELECT DISTINCT GPU_Name FROM GPUdetails ");
                while ($names = mysqli_fetch_array($getNames)) {
                    echo '<option value="' . $names['GPU_Name'] . '"></option>';
                }
                mysqli_free_result($getNames);
                ?>
            </datalist>
            </div>
        </div>
        
        <div >
          <h3 style="margin-left: 20px;">Please Enter the CPU name</h3>   
          <div class="center">
             <input list="CPUNames" name="CPUName" id="CPUName" class="custominput">  
             <datalist id="CPUNames">
                <?php
                $getCPU = mysqli_query($con, "SELECT DISTINCT CPU_Name FROM CPUdetails_1 ");
                while ($CPUNames = mysqli_fetch_array($getCPU)) {
                    echo '<option value="' . $CPUNames['CPU_Name'] . '"></option>';
                }
                mysqli_free_result($getCPU);
                ?>
             </datalist>
        </div>
     </div>

 
 
 
    </div>


    <div style="height: 10px;"></div>

    <div class="center">
        <input type="submit" style="margin-left: 25px;">
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["GPUName"]) && isset($_POST["CPUName"])) {
        $gpuName = $_POST["GPUName"];
        $cpuName = $_POST["CPUName"];

        $gpuStr = mysqli_query($con, "SELECT DISTINCT Strength FROM GPUdetails WHERE GPU_Name='$gpuName'");
        $toreadable = mysqli_fetch_array($gpuStr);
        $gpuStr1 = $toreadable[0];

        $cpuStr = mysqli_query($con, "SELECT DISTINCT Strength FROM CPUdetails_1 WHERE CPU_Name='$cpuName'");
        $toreadable1 = mysqli_fetch_array($cpuStr);
        $cpuStr1 = $toreadable1[0];


        echo '<div class="center">';
            if($gpuStr1 > $cpuStr1){
            echo '<div><h3>' . $gpuName . ' graphics card is being bottlenecked by ' . $cpuName . '</h3></div>';
            }
            else{
            echo '<div><h3>' . $gpuName . ' graphics card is NOT being bottlenecked by ' . $cpuName . '</h3></div>';
            }
        echo '</div>';

       
        }
}
?>

</body>
</html>