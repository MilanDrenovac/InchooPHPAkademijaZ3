<!DOCTYPE html>
<html lang='en'>
<head>
    <link rel='stylesheet' href='style.css'>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Homework 3</title>

</head>
<body>
<div class='input'>
<form action='index.php' method='post'>
    <span>Rows:</span>
    <input type='text' name='x' value='<?php echo $_POST['x'];?>'>
    <span>Columns:</span>
    <input type='text' name='y' value='<?php echo $_POST['y'];?>'><br>
    <input type='submit' value='Create Table'>
</form>
</div>
<div class='output'>
<?php
// Function to build the clockwise table that takes values X and Y for the table
// &$a is a global array to store the numbers
// Also assigns a direction for the css code on the table
function tableBuilder($x, $y, &$a, &$class)
{
    $numb = 1;
    $countX = 0;
    $countY = 0;
    while ($countX < $x && $countY < $y)
    {
        // Print the first x from the remaining x

        for ($i = $countY; $i < $y; ++$i) {
            $a[$countX][$i] = $numb++;
            $class[$countX][$i] = $i == $y-1 ? 'down' : 'right';
        }
        $countX++;

        // Print the last y from the remaining y

        for ($i = $countX; $i < $x; ++$i) {
            $a[$i][$y - 1] = $numb++;
            $class[$i][$y - 1] = $i == $x-1 ? 'left' : 'down';
        }
        $y--;

        // Print the last x from the remaining x

        if ($countX < $x)
        {
            for ($i = $y - 1; $i >= $countY; --$i) {
                $a[$x - 1][$i] = $numb++;
                $class[$x - 1][$i] = $i == $countY ? 'up' : 'left';
            }
            $x--;
        }

        // Print the first y from the remaining y

        if ($countY < $y)
        {
            for ($i = $x - 1; $i >= $countX; --$i) {
                $a[$i][$countY] = $numb++;
                $class[$i][$countY] = $i == $countX ? 'right ': 'up';
            }
            $countY++;
        }
    }
}
// Function that checks the validity of numbers
function validInput($a){
    if(! is_numeric($a) || $a<0){
        echo "not a valid input: $a";
        exit(0);
    }
    return (int) $a;
}
$x = validInput($_POST['x']);
$y = validInput($_POST['y']);
//echo $x,$y;

tableBuilder($x, $y, $a, $class);

// Writing the table in HTML

$tableLast = $x*$y;
echo '<table>';
$class[0][0] = 'start';
for($i=0;$i<$x;$i++){
    echo '<tr>';
    for($j=0;$j<$y;$j++){
        $n = $a[$i][$j];
        echo '<td class=',($n == $tableLast ? '' : $class[$i][$j] ),'>';
        echo $n;
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
preg_replace('<td class ="right">1<\/td>', '<td class = "start">1<\/td>', 'index.php')

?>
</div>
</body>
</html>