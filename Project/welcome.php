<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    echo "Name is required\n";
  } else {

    echo($_POST["name"]);
  }

  if (empty($_POST["email"])) {

    echo "Email is required";
	
  } else {

    echo($_POST["email"]);
  }
}
?>



