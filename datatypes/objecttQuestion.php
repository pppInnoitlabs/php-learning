<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h4 class="h4">normal page</h4>
<?php 

class Classroom{

public $classname;
public $motto;

public function __construct($classname , $motto){
    $this-> classname = $classname;
    $this->motto = $motto;

}
public function classmate(){
    return "class name is : ".$this->classname."".$this->motto;
}

}

$myClassroom = new Classroom("Adit","programming languages");

 echo $myClassroom->classmate();
 echo "<br>";

 echo var_dump($myClassroom);
 
 ?>
</body>
</html>