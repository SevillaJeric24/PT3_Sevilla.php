<!DOCTYPE html>
<html>
<head>
<title>Grade Calculator</title>
<style>
body {
  font-family: sans-serif;
  background-color:rgb(128, 126, 212);
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 10px;
  margin: 0;
}

.container {
  background-color: #57a3bb;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(1, 1, 1, 1.1);
  text-align: center;
}

h1 {
  color: #333;
}

form {
  display: grid;
  grid-gap: 15px;
}

input[type="number"] {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
  box-sizing: border-box;
}

input[type="submit"] {
  background-color:rgb(8, 59, 9);
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.results {
  margin-top: 30px;
}

.results p {
  font-size: 18px;
  color: #333;
}

table {
  width: 50%;
  border-collapse: collapse;
}
th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: left;
}
</style>
</head>
<body>
<div class="container">
<h1>Grade Calculator</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  1st Quarter Grade: <input type="number" name="grade1" required><br><br>
  2nd Quarter Grade: <input type="number" name="grade2" required><br><br>
  3rd Quarter Grade: <input type="number" name="grade3" required><br><br>
  4th Quarter Grade: <input type="number" name="grade4" required><br><br>
  <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $grade1 = $_POST["grade1"];
  $grade2 = $_POST["grade2"];
  $grade3 = $_POST["grade3"];
  $grade4 = $_POST["grade4"];

  $average = ($grade1 + $grade2 + $grade3 + $grade4) / 4;

  $description = "";
  $remarks = "";

  if ($average >= 90) {
    $description = "Outstanding";
    $remarks = "Passed";
  } elseif ($average >= 85) {
    $description = "Very Satisfactory";
    $remarks = "Passed";
  } elseif ($average >= 80) {
    $description = "Satisfactory";
    $remarks = "Passed";
  } elseif ($average >= 75) {
    $description = "Fairly Satisfactory";
    $remarks = "Passed";
  } else {
    $description = "Did Not Meet Expectations";
    $remarks = "Failed";
  }

  echo "<h2>Results:</h2>";
  echo "<p>Average Grade: " . number_format($average, 2) . "</p>";
  echo "<p>Description: " . $description . "</p>";
  echo "<p>Remarks: " . $remarks . "</p>";
}
?>

</body>
</html>