<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multi dimen</title>
</head>
<body>
    <?php

            class Multi{
                public $Office = ["managers"=>[["first"=>"ravindar", "second"=>"kotesh"],["first"=>"ravindar", "second"=>"kotesh"]],
                                ["traniee"=>[["one"=>"prabhu","tow"=>"narendar","seven"=>"akhil"],["three"=>"ended", "four"=>"five"]]]
                            ];
            }
            $Output = new Multi();

           echo $Output->Office["managers"][0]["first"];
           echo "<br>";
           var_dump($Output->Office);
           echo "<br>";

           foreach($Output->Office as $key => $value){
            echo "name is : ".$key."    and the value are : ".$value;
           }

    ?>
</body>
</html>