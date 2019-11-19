<?php 
require("includes/config.php");
if(!$_SESSION['login']){
   header("location:../index.php");
   die;
}
?>
<!DOCTYPE html>
<html>
<title>FINANCIAL REPORT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="w3css.css">
<link rel="stylesheet" type="text/css" href="w3css1.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

th {
    text-align: left;
    padding: 8px;
}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<?php require('includes/sidemenu.php');?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
<?php require('includes/header.php');?>
<div id="piechart" align="center"></div>
<br/>
<div align="center">
<table cellpadding="5" cellspacing="0" border="1" width="75%">
<br/>
<tr>
<td colspan="5" align="center"><b>MEMBERS FEE</b></td>
</tr>
<tr>
<th> Name</th>
<th> Metric ID</th>
<th> Date of Payment</th>
<th> Total Payment</th>
</tr>

<?php
$result = $db->prepare("SELECT * FROM payment");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$metricid= $row['metricid'];
$dateofpayment= $row['dateofpayment'];
$totalpayment= $row['totalpayment'];

$result1 = $db->prepare("SELECT * FROM profile WHERE metricid='$metricid'");
$result1->execute();
$row = $result1->fetch(PDO::FETCH_ASSOC);
$name= $row['name'];


echo "<tr>
<td>  $name </td>
<td>  $metricid </td>
<td>  $dateofpayment</td>
<td>  $totalpayment</td>
</tr>";
 
}

$result = $db->prepare("SELECT SUM(totalpayment) AS totalpayment FROM payment");
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
$totalpayment = $row['totalpayment'];

?>
<tr>
<td colspan="5" align="right">Total Fee Payed: <?php echo $totalpayment; ?></td>
</tr>
</table>
</div>

<br/>


<br/>
<div align="center">
<table cellpadding="5" cellspacing="0" border="1" width="75%">
<br/>
<tr>
<td colspan="5" align="center"><b>DONATION</b></td>
</tr>
<tr>
<th> Name</th>
<th> Identification</th>
<th> Date of Donation</th>
<th> Total Donation</th>
</tr>

<?php
$result = $db->prepare("SELECT * FROM donation");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$name= $row['name'];
$identification= $row['identification'];
$dateofdonation= $row['dateofdonation'];
$totaldonation= $row['totaldonation'];


echo "<tr>
<td>  $name </td>
<td>  $identification </td>
<td>  $dateofdonation</td>
<td>  $totaldonation</td>
</tr>";
} 

$result = $db->prepare("SELECT SUM(totaldonation) AS totaldonation FROM donation");
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
$totaldonation = $row['totaldonation'];

?>
<tr>
<td colspan="5" align="right">Total Donation Collected: <?php echo $totaldonation; ?></td>
</tr>
</table>
</div>

<br/>

<div align="center">
<table cellpadding="5" cellspacing="0" border="1" width="75%">
<br/>
<tr>
<td colspan="5" align="center"><b>EXPENSES</b></td>
</tr>
<tr>
<th> Name</th>
<th> Identification</th>
<th> Date of Usage</th>
<th> Total Usage</th>
</tr>

<?php
$result = $db->prepare("SELECT * FROM expenses");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$name= $row['name'];
$identification= $row['identification'];
$dateofusage= $row['dateofusage'];
$totalusage= $row['totalusage'];


echo "<tr>
<td>  $name </td>
<td>  $identification </td>
<td>  $dateofusage</td>
<td>  $totalusage</td>
</tr>";
} 

$result = $db->prepare("SELECT SUM(totalusage) AS totalusage FROM expenses");
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
$totalusage = $row['totalusage'];

?>
<tr>
<td colspan="5" align="right">Total Expenses Used: <?php echo $totalusage; ?></td>
</tr>
</table>
</div>
  

 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Type', 'Financial'],
  ['Member Fees', <?php echo $totalpayment; ?>],
  ['Donation', <?php echo $totaldonation; ?>],
  ['Expenses Usage', <?php echo $totalusage; ?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Financial Report', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

<?php require('includes/footer.php');?>
