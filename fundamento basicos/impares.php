<?php

//Possibilidade 1
/*
for ($contador = 1; $contador <= 100; $contador ++) {
    

    if($contador % 2 == 0 ){

    }else{
        echo "#$contador" . PHP_EOL;
    }
}
*/
//Possibilidade 2
for ($contador = 1; $contador <= 100; $contador ++) {
    

    if($contador % 2 != 0 ){
    echo "#$contador" . PHP_EOL;  
    }
        
}