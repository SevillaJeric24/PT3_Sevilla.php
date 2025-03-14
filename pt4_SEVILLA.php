<!DOCTYPE html>
<html>
<head>
<title>Sum of Squares and Cubes</title>
<style>
body {
  font-family: sans-serif;
  background: linear-gradient(135deg,#357fe5,#354ae5,#23952391,#249926);}
.container {
  width: 300px;
  margin: 20px auto;
  padding: 20px;
  border: 5px solid #0c0301;
  background: linear-gradient(135deg,#b7f0f1,#edf1b7,#239691,#249922);}
</style>
</head>
<body>

<div class="container">
<body>

<h1>Calculate Sum of Squares and Cubes</h1>

<form method="POST">
    <label for="limit">Enter the Upper Limit:</label>
    <input type="number" id="limit" name="limit" required>
    <button type="submit">Submit</button>
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        
        $n = $_POST["limit"];
    if ($n > 0) 
        $squares = 0;
        $cubes = 0;

        
        $i = 1;
        for ($i = 1; $i <= $n;  $i++) {
            $squares += $i * $i;
            $cubes +=  $i * $i * $i;
        }
        echo "<divc class='result'>";
        echo "<h2>The sum of Squares from 1 to $n is $squares.</h6>";
        echo "<h2>The sum of Cubes from 1 to $n is $cubes.</h6>";
    }
    ?>


</div>
</body>
</html>