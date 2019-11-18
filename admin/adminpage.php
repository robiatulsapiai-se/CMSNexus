<?php 
require("includes/config.php");
if(!$_SESSION['login']){
   header("location:../index.php");
   die;
}
?>
<!DOCTYPE html>
<html>
<title>MEMBERS PAGE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="w3css.css">
<link rel="stylesheet" type="text/css" href="w3css1.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
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
<br/>
<div align="center">
<table cellpadding="5" cellspacing="0" border="1" width="75%">
<br/>
<tr>
<td colspan="3" align="center"><b>ADMINISTRATOR</b></td>
</tr>
<tr>
<th> Manage Members:</th>
<th> Manage Membership Maintenance Fees</th>
<th> Manage Financial</th>
</tr>

<tr>
<td>
<ul>
<li><a href="memberlist.php">Members List</a></li>
</ul>
</td>

<td>
<ul>
<li><a href="memberfee.php">Membership Fees Management</a></li>
</ul>
</td>

<td>
<ul>
<li><a href="donation.php">Donation Management</a></li>
<li><a href="expenses.php">Expenses Management</a></li>
<li><a href="financialreport.php">Financial Record</a></li>
</ul>
</td>
</tr>

</tr>
<tr>
<th> Manage Announcements:</th>
<th> Manage Events</th>
<th> Manage e-Advertisement</th>
</tr>

<tr>
<td>
<ul>
<li><a href="announcement.php">Announcements</a></li>
</ul>
</td>

<td>
<ul>
<li><a href="event.php">Events</a></li>
</ul>
</td>

<td>
<ul>
<li><a href="advertisement.php">e-Advertisement</a></li>
</ul>
</td>
</tr>
</table>
</div>


  

  

 

<script>
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