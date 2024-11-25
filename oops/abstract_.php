<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abstract</title>
</head>
<body>
    <?php
        abstract class Animal{
            protected $run;
            abstract public function sound():string;

            public function __construct($run){
                $this->run = $run;
            }
        }
        class Cat extends Animal{
            public function sound():string{
                return $this->run;
            }
        }

        $AnimlaObj = new Cat("meowww..");
        echo $AnimlaObj->sound();
    ?>
</body>
</html>