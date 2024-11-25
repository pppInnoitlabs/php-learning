<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>class obj</title>
</head>
<body>
    <?php

        class Inharitance_{
            public $brand;
            public $make;

            public function __construct($brand , $make){
                $this->brand = $brand;
                $this->make  = $make;

            }

            public function getNames(){
                echo "brand is : $this->brand  the make is : $this->make";
            }
        }

        $obj = new Inharitance_("bmw" , "hyderabad");
        $obj->getNames();
    ?>
</body>
</html>