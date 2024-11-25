<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>circle</title>
</head>
<body>
    <?php

        class Calculate_radius{
            public $radius;
            public function __construct($radius){
                $this->radius = $radius;
    
            }
            public function calculate(){
                return 3.12 * $this->radius * $this->radius;
            }
        }

        $obj = new Calculate_radius(3);
        echo "the circle is : ". $obj->calculate();
    ?>
</body>
</html>