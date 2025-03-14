<!DOCTYPE html>
<html>
<head>
<title>Sum of Squares and Cubes</title>
<style>
body {
  font-family: sans-serif;
  background: linear-gradient(135deg,#66c3ca,#38bd64,#c85d3d,#38bd93);}
.container {
  width: 300px;
  margin: 20px auto;
  padding: 20px;
  border: 5px solid #0c0d0c;
background-color:lightgreen;}
</style>
</head>
<body>

<div class="container">
  <h2>Sum of Squares</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Enter the number of N: <input type="number" name="n_squares" required><br><br>
    <input type="submit" name="submit_squares" value="Calculate">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_squares"])) {
    $n = $_POST["n_squares"];
    if (is_numeric($n) && $n > 0) {
      $sum = 0;
      for ($i = 1; $i <= $n; $i++) {
        $sum += $i * $i;
      }
      echo "<p>The sum of squares from 1 to " . $n . " is: " . $sum . "</p>";
    } else {
      echo "<p>Please enter a valid positive integer for N.</p>";
    }
  }
  ?>
</div>


<div class="container">
  <h2>Sum of Cubes</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Enter the number of N: <input type="number" name="n_cubes" required><br><br>
    <input type="submit" name="submit_cubes" value="Calculate">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_cubes"])) {
    $n = $_POST["n_cubes"];
    if (is_numeric($n) && $n > 0) {
      $sum = 0;
      for ($i = 1; $i <= $n; $i++) {
        $sum += $i * $i * $i;
      }
      echo "<p>The sum of cubes from 1 to " . $n . " is: " . $sum . "</p>";
    } else {
      echo "<p>Please enter a valid positive integer for N.</p>";
    }
  }
  ?>
</div>

</body>
</html>