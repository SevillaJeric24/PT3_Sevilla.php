<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
echo "Enter the Upper Limit: 7 <br>"; 
$n = 7;

$sumOfSquares = 0;
$sumOfCubes = 0;

$i = 1;
while ($i <= $n) {
    $sumOfSquares += $i * $i;
    $sumOfCubes += $i * $i * $i;
    $i++;
}

echo "The sum of Squares from 1 to ". $n. " is ". $sumOfSquares. ".<br>";

echo "The sum of Cubes from 1 to ". $n. " is ". $sumOfCubes. ".<br>";

?>
</body>

</html>