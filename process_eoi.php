<?php
// Stop people opening this page directly
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: apply.php");
  exit();
}

// Get data from the form
$ref = trim($_POST['ref']);
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);

// Validate the data
$errors = [];

if (!preg_match("/^[A-Za-z]{2,20}$/", $fname)) {
  $errors[] = "Invalid first name.";
}

if (!preg_match("/^[A-Za-z]{2,20}$/", $lname)) {
  $errors[] = "Invalid last name.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Invalid email address.";
}

if (!preg_match("/^[0-9]{8,12}$/", $phone)) {
  $errors[] = "Invalid phone number.";
}

if (count($errors) > 0) {
  foreach ($errors as $error) {
    echo "<p>$error</p>";
  }
  exit();
}

// Connect to the database (use your settings.php file)
require_once("settings.php");
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
  echo "<p>Database connection failure</p>";
  exit();
}

// Insert the data safely
$stmt = $conn->prepare("INSERT INTO eoi (ref, fname, lname, email, phone) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $ref, $fname, $lname, $email, $phone);

if ($stmt->execute()) {
  echo "<p>EOI successfully submitted!</p>";
} else {
  echo "<p>Error: " . $stmt->error . "</p>";
}

$stmt->close();
$conn->close();
?>

