<?php   
// Question 1:
// Write a function that takes two numbers as input and returns their sum, product, difference, and quotient using arithmetic operators.




echo "question 1";
echo "<br>";

function summ($num  , $num1){
    $twosum = $num + $num1;
    echo $twosum;
    echo '<br>';
    // global $division;
    // global $divisionJ_error;

    if($num1 !=0){
        $division = $num / $num1;
        echo $division;
        echo "<br>";
    }else{
        $division_error = "the {$num} is not divesable by {$num1}";
        echo $division_error;
        echo "<br>";
    }



}
$result = summ(20,30);

echo $result;




?>