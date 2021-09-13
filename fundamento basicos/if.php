<?php

$idade = 21;

echo "Pode se tiver 18 anos ou mais " . PHP_EOL;

if ($idade >= 18){
    echo "Eu tenho $idade anos. Entra ai" . PHP_EOL;
}
else{
    echo "Eu tenho $idade anos. Não posso entrar" . PHP_EOL;
}

// Possibilidade  2

if ($idade == 18 || $idade > 18){
    echo "Eu tenho $idade anos. Entra ai";
}


// Possibilidade  3

if ($idade == 18 or $idade > 18){
    echo "Eu tenho $idade anos. Entra ai";
}