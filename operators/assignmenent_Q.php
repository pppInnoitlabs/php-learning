<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="number" name="num" id="num" required>
        <input type="submit" value="submit">
    </form>

<?php
// Write a program that reads a number from the user and repeatedly subtracts 1 from it using the -= operator until the number becomes zero.


if($_SERVER["REQUEST_METHOD"]== 'POST');
$num = $_POST['num'];

echo "<p> you entered number is : ".$num ."</p>";

?>
</body>
</html>