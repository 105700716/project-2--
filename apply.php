<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply - Expression of Interest</title>
</head>
<body>
  <h1>Expression of Interest Form</h1>
  <p>Please fill out your details below and submit your application.</p>

  <!-- The form starts here -->
  <form action="process_eoi.php" method="post">
    <label for="ref">Job Reference Number:</label><br>
    <input type="text" name="ref" id="ref" required><br><br>

    <label for="fname">First Name:</label><br>
    <input type="text" name="fname" id="fname" required><br><br>

    <label for="lname">Last Name:</label><br>
    <input type="text" name="lname" id="lname" required><br><br>

    <label for="email">Email Address:</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <label for="phone">Phone Number:</label><br>
    <input type="text" name="phone" id="phone" required><br><br>

    <input type="submit" value="Submit Application">
  </form>
</body>
</html>

