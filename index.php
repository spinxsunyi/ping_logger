<?php
include "connection.php";
        $dataPoints = array();
        $sql = "SELECT id, time_stamp, domain, time FROM tb_ping ORDER BY id DESC LIMIT 50"; //last 50 data version
        // $sql = "SELECT * FROM tb_ping"; //all data versian
        $qry = mysqli_query($conn,$sql);
        while($arr = mysqli_fetch_array($qry))
        {
            array_push($dataPoints, array("x"=> $arr['id'], "y"=>$arr['time'],"host"=>$arr['domain'], "tm" => $arr['time_stamp'] ));
        }

//  $dataPoints = array(
// 	array("y" => 25, "label" => "Sunday"),
// 	array("y" => 15, "label" => "Monday"),
// 	array("y" => 25, "label" => "Tuesday"),
// 	array("y" => 5, "label" => "Wednesday"),
// 	array("y" => 10, "label" => "Thursday"),
// 	array("y" => 0, "label" => "Friday"),
// 	array("y" => 20, "label" => "Saturday")
// );
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Last 100 Ping google.com"
	},
	axisY: {
		title: "milliseconds"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<meta http-equiv='refresh' content='2'/>
<body>
    <div align="center">
        <h1>Raspberry PI Home Internet Monitoring</h1>
        <br>
        <div id="chartContainer" style="height: 370px; width: 60%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <br>
    <h3>last 5 ping data<h3>
    <table>
    <tr>
        <th>id</th>
        <th>date time</th>
        <th>Host</th>
        <th>ping time</th>
    </tr>
    <?php 
        foreach (array_reverse(array_slice($dataPoints, 0, 5)) as $data){ 
            //code to be executed; 
            echo "<tr>";
            echo "<td>".$data['x']."</td>";
            echo "<td>".$data['tm']."</td>";
            echo "<td>".$data['host']."</td>";
            echo "<td>".$data['y']."</td>";
            echo "<tr>";
        } 
    ?>
    </table>

    </div>
</body>




<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

td, th {
  border: 2px solid grey;
  text-align: center;
  padding: 2px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</html>