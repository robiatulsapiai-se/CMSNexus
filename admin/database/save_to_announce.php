<?php
$ref = $title = $description ="";
$refErr = $titleErr = $descriptionErr = "";
$valid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valid = true;

  if (empty($_POST["ref"])) {
    $refErr = "Required";
	$valid = false;
  } else {
    $ref = test_input($_POST["ref"]);
  }
  
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
$ref= $_POST['ref'];
$date= $_POST['date'];
$title= $_POST['title'];
$description= $_POST['description'];



try {
    $sql = "INSERT INTO announce (ref, date, title, description)
 VALUES
('$ref', '$date', '$title', '$description')";
    $sth = $db->query($sql);
} catch(PDOException $e) {
    echo $e->getMessage();
}


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