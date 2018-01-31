<?php

$file = fopen("codes/code__16505.html","r");
$count = "0";

while(!feof($file)) {
  $count++;   
echo   $count;
    switch ($count) {
        case "108":
            $lines = fgets($file);
           
            break;
       
    }
}

echo $lines;

fclose($file);