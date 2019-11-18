<?php
if (isset($_GET['ref'])){
$ref = $_GET['ref'];
$_SESSION['ref']=$ref;
$result = $db->prepare("SELECT * FROM announce WHERE ref = '$ref'");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$ref= $row['ref'];
$title= $row['title'];
$description= $row['description'];
$date= $row['date'];
} 
}
$titleErr = $descriptionErr = "";
$valid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valid = true;
  
  if (empty($_POST["title"])) {
    $titleErr = "Required";
	$valid = false;
  } else {
    $title = test_input($_POST["title"]);
  }
  
  if (empty($_POST["description"])) {
    $descriptionErr = "Required";
	$valid = false;
  } else {
    $description = test_input($_POST["description"]);
  }
  

if ($valid){
$date= $_POST['date'];
$title= $_POST['title'];
$description= $_POST['description'];



$result = $db->prepare("UPDATE announce SET date='".$date."', title='".$title."', description='".$description."'  WHERE ref = '".$_SESSION['ref']."'");
$result->execute();
echo "Infomation Successfully Updated";
	echo "<script>
	alert('Infomation Successfully Updated');
	window.location.href='announcement.php';
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