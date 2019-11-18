<?php
$name = $identification = $description = $totalusage ="";
$nameErr = $identificationErr = $descriptionErr = $totalusageErr = "";
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
  
  if (empty($_POST["description"])) {
    $descriptionErr = "Required";
	$valid = false;
  } else {
    $description = test_input($_POST["description"]);
  }
  
  if (empty($_POST["totalusage"])) {
    $totalusageErr = "Required";
	$valid = false;
  } else {
    $totalusage = test_input($_POST["totalusage"]);
  }
  

if ($valid){
$name= $_POST['name'];
$identification= $_POST['identification'];
$dateofusage= $_POST['dateofusage'];
$totalusage= $_POST['totalusage'];
$description= $_POST['description'];



try {
    $sql = "INSERT INTO expenses (name, identification, dateofusage, totalusage, description)
 VALUES
('$name', '$identification', '$dateofusage', '$totalusage', '$description')";
    $sth = $db->query($sql);
} catch(PDOException $e) {
    echo $e->getMessage();
}

echo "<script>
window.location.href='expenses.php';
</script>";
}
 
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>