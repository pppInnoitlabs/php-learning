<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="num">num</label>
        <input type="number" name="num" id="num">
        <label for="num2">num2</label>
        <input type="number" name="num2" id="num2">
        <input type="submit" value="compare">
    </form>


<?php 
// Write a program that takes two integers as input and prints whether the first number is greater than, less than, or equal to the second number using comparison operators.


if($_SERVER ["REQUEST_METHOD"]== "POST"){
    $num = $_POST["num"];
    $num2 = $_POST["num2"];
    if($num > $num2){
        echo "<p> ".$num." num 1 is greate than num 2  </p>";
    }elseif($num < $num2){
        echo "<p> num 2 is greate than num 1 </p>"; 
    }else{
        echo "<p> both are equal numbers.. </p>";
        
    }

}


?>

</body>
</html>