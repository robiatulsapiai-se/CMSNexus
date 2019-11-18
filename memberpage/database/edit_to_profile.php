<?php
$result = $db->prepare("SELECT * FROM profile WHERE username = '".$_SESSION['username']."'");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$name= $row['name'];
$metricid= $row['metricid'];
$phoneno= $row['phoneno'];
$email= $row['email'];
$address= $row['address'];
$postcode= $row['postcode'];
$city= $row['city'];
$state= $row['state'];
$residing= $row['residing'];
} 

$nameErr = $metricidErr = $phonenoErr = $emailErr = $addressErr = $postcodeErr = $cityErr = $residingErr="";
$valid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valid = true;
  
  if (empty($_POST["name"])) {
    $nameErr = "Required";
	$valid = false;
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["metricid"])) {
    $metricidErr = "Required";
	$valid = false;
  } else {
    $metricid = test_input($_POST["metricid"]);
  }
  
  if (empty($_POST["phoneno"])) {
    $phonenoErr = "Required";
	$valid = false;
  } else {
    $phoneno = test_input($_POST["phoneno"]);
	 if (!preg_match("/^[0-9 ]*$/",$phoneno)) {
      $phonenoErr = "Invalid";
	$valid = false;	  
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Required";
	$valid = false;
  } else {
    $email = test_input($_POST["email"]);
  }
  
  if (empty($_POST["address"])) {
    $addressErr = "Required";
	$valid = false;
  } else {
    $address = test_input($_POST["address"]);
  }
  
  if (empty($_POST["postcode"])) {
    $postcodeErr = "Required";
	$valid = false;
  } else {
    $postcode = test_input($_POST["postcode"]);
	 if (!preg_match("/^[0-9 ]*$/",$postcode)) {
      $postcodeErr = "Invalid";
	$valid = false;	  
    }
  }
  
  if (empty($_POST["city"])) {
    $cityErr = "Required";
	$valid = false;
  } else {
    $city = test_input($_POST["city"]);
  }
  
  if (empty($_POST["residing"])) {
    $residingErr = "Required";
	$valid = false;
  } else {
    $residing = test_input($_POST["residing"]);
  }
if ($valid){
if(isset($_POST['submit']))
{
$username= $_SESSION['username'];
$name= $_POST['name'];
$metricid= $_POST['metricid'];
$phoneno= $_POST['phoneno'];
$email= $_POST['email'];
$address= $_POST['address'];
$postcode= $_POST['postcode'];
$city= $_POST['city'];
$state= $_POST['state'];
$residing= $_POST['residing'];

	
$result = $db->prepare("UPDATE profile SET name='".$name."', metricid='".$metricid."', phoneno='".$phoneno."', email='".$email."', address='".$address."', postcode='".$postcode."', city='".$city."', state='".$state."', residing='".$residing."'  WHERE username = '".$_SESSION['username']."'");
$result->execute();
	echo "<script>
	alert('Infomation Successfully Updated');
	window.location.href='viewprofile.php';
	</script>";

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