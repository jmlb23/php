<?php

//as referecias son un alias dunha variable
//se modificamos o contido dunha referencia modificamos o orixe
//pasar por referencia o valor dunha vairble a outra faise con =&
//aqui non éc omo en c++ que temos acceso a direccion de memoria
// e podemos facer aritmetica de punteiros
$v = 5;
//s apunta o contido de v
$s =& $v;
// se modificamos s modificamos v
++$s;

echo $v."<br/>";


//pasando por refencia valores a unha funcion
//indicamos no parametro da funcion e cando damos os argumentos xa non fai falla indicarllo
//coma en c++ non ten sentido a unha funcion declarada como
// int h(int* v); pasarlle h(*a) xa que pasamos a referencia e non o contido
function ref(&$b){
	$b++;
}
$x = 5;
//pasamos o valor que a funcion recive por referencia non por copia
ref($x);
//non fai falla o return xa que apunta directamente o contido da variable pasada e se a modificamos no interior da funcion
//queda modificada no orixe
echo $x."<br/>";

//sen referencias pasando o valor por copia

function senRef($a){
	$a++;
}
$h=5;
senRef($h);
echo $h;
