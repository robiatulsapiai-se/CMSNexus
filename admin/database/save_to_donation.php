<?php
$name = $identification = $receiptnum = $totaldonation ="";
$nameErr = $identificationErr = $receiptnumErr = $totaldonationErr = "";
$valid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valid = true;
	
  if (empty($_POST["name"])) {
    $nameErr = "Required";
	$valid = false;
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["identification"])) {
    $identificationErr = "Required";
	$valid = false;
  } else {
    $identification = test_input($_POST["identification"]);
  }
  
  if (empty($_POST["receiptnum"])) {
    $receiptnumErr = "Required";
	$valid = false;
  } else {
    $receiptnum = test_input($_POST["receiptnum"]);
  }
  
  if (empty($_POST["totaldonation"])) {
    $totaldonationErr = "Required";
	$valid = false;
  } else {
    $totaldonation = test_input($_POST["totaldonation"]);
	 if (!preg_match("/^[0-9 ]*$/",$totaldonation)) {
      $totaldonationErr = "Invalid";
	$valid = false;	  
    }
  }
  

if ($valid){
$name= $_POST['name'];
$identification= $_POST['identification'];
$dateofdonation= $_POST['dateofdonation'];
$totaldonation= $_POST['totaldonation'];
$receiptnum= $_POST['receiptnum'];



try {
    $sql = "INSERT INTO donation (name, identification, dateofdonation, totaldonation, receiptnum)
 VALUES
('$name', '$identification', '$dateofdonation', '$totaldonation', '$receiptnum')";
    $sth = $db->query($sql);
} catch(PDOException $e) {
    echo $e->getMessage();
}


}
 
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>