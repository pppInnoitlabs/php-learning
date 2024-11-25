<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>normal array</title>
</head>
<body>
    <?php
        class ArraYY{
            public $Office = [
                "name"=> "innoilabs",
                "area"=> "sr nagar " ,
                "city"=> "hyderabad" ];
        }

        $Output = new ArraYY();
        
        foreach($Output->Office as $key => $value){
            echo $key . "   " . $value;
        }
        echo "<br>";
        var_dump($Output->Office)
    ?>
</body>
</html>