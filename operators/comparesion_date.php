<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <input type="date" name="one" id="one">
    <input type="date" name="two" id="two">
    <input type="submit" value="check">
</form>

<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $one = $_POST["one"];
    $two = $_POST["two"];

    if($one > $two){
       echo "<p>first date is later</P>";
    }elseif($one < $two){
        echo "<p>first date is earlier</p>";
    }else{
       echo "<p>both date's are same</p>";

    }
}

?>

</body>
</html>