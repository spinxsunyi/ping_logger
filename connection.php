
<?php 
$sqlServer = "localhost";
$sqlUser = "root";
$sqlPass = "";
$sqlDb = "smarthome";

global $conn;
$conn = mysqli_connect($sqlServer,$sqlUser,$sqlPass,$sqlDb);

?>