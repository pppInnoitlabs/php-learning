<?php

$demo_file = fopen("demo.txt","r");


if($demo_file){
    while(($line = fgets($demo_file))!==false){
        echo nl2br($line);
    }
    fclose(($demo_file));
}else{
    echo "unable to open file..!";
}

// var_dump($demo_file);
?>