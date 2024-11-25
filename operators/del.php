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
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $num = $_POST["num"];
        $num2 = $_POST["num2"];

        if($num === $num2){
            echo "<p>both are same</p>";
        }
        else{
            echo "<p> both are not equal.. </p>";
        }
    }
    ?>
</body>
</html>