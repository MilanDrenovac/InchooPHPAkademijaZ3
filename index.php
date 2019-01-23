<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework 3</title>

</head>
<body>
<div class="input">
<form action="index.php" method="post">
    Input Your Numbers:<br>
    <input type="text" name="x" ><br>
    <input type="text" name="y" ><br>
    <input type="submit" value="Submit">
</form>
</div>
<div class="output">
<?php
// Function to build the clockwise table that takes values X and Y for the table
// &$a is a global array to store the numbers
function tableBuilder($x, $y, &$a)
{
    $numb = 1;
    $countX = 0;
    $countY = 0;
    while ($countX < $x && $countY < $y)
    {
        // Print the first x from the remaining x

        for ($i = $countY; $i < $y; ++$i) {


            $a[$countX][$i] = $numb++;
        }
        $countX++;

        // Print the last y from the remaining y

        for ($i = $countX; $i < $x; ++$i) {
            $a[$i][$y - 1] = $numb++;
        }
        $y--;

        // Print the last x from the remaining x

        if ($countX < $x)
        {
            for ($i = $y - 1; $i >= $countY; --$i) {
                $a[$x - 1][$i] = $numb++;
            }
            $x--;
        }

        // Print the first y from the remaining y

        if ($countY < $y)
        {
            for ($i = $x - 1; $i >= $countX; --$i) {
                $a[$i][$countY] = $numb++;
            }
            $countY++;
        }
    }
}
$x = $_POST['x'];
$y = $_POST['y'];

tableBuilder($x, $y, $a);

// Writing the table in HTML

echo "<table>";
for($i=0;$i<$x;$i++){
    echo "<tr>";
    for($j=0;$j<$y;$j++){
        echo "<td>";
        echo ($a[$i][$j]);
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";


?>
</div>
</body>
</html>