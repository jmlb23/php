<?php
$variable_global = 5;
echo "<pre>";
echo var_dump($GLOBALS);
echo "</pre>";

function calable(){
	echo "hola desde un calable";

}

function chamada($s){
	$s();
}

chamada("calable");

include("hola.inc");

echo $a=5;


function scope(){
	//para aceder a global teriamos que usar o array global ou
	//indicar que a variable é global
	//global $a; esta é unha maneira
	//non fai falla o dollar xa que queremos aceder a variable chamada a
	//é un array asociativo con key o nome da variable e o valor da mesmnon fai falla o dollar xa que queremos aceder a variable chamada a
	//é un array asociativo con key o nome da variable e o valor da mesmaa
	echo $GLOBALS['a'];

}

scope();

		///////////////////////////////
		//	static concepto	     //
		///////////////////////////////

//o concepto de static é o mesmo que en c en progrmacion procedural
//é dicir que o valor entre chamada e chamada da funcion conservase
//sen o static como en c é impensable que na funcion as variable entre
//chamada e chamada conseven o valor
//xa que cada chamada levaria consigo unha nova reserva de memoria das varibles
//propia de cada chamada a funcion
//no stack en c????
function static_value(){
	static $v = 5;
	echo "<br/>".$v."<br/>";
	$v *= 2;
	

}

for($x = 0; $x<10; $x++)static_value();


//cada chamada a funcion ten a sua reserva de memoria independente
function non_static_value(){
	$v = 5;
	echo "<br/>".$v."<br/>";
	$v *= 2;
	

}

for($x = 0; $x<10; $x++)non_static_value();

//as regras do static e global non se aplican as referencias


		//////////////////////////////
		//    variables variables   //
		//////////////////////////////

$a = "b";//asignamos normalmente un valor a unha variable
$$a = "c";// e ao contido da primeira vaille ser asinado como nome o valor da primeira e como valor o contido da $$
//é como un punteiro a un punteiro mais ou menos mais ou menos
//como é unha variable normal so se aceptan nomes de variables validos para php
//esta moi relacionado con crear e acceeder nomes de variable e funcions dinamicament p.e.
//$a() chamaria a unha funcion con nome do contido de a

//podemos chamar as variables de variable de varias formas
//nun string que expanda as variables tanto herdoc como ""
//${} é aplicalle o dollar a o contido da expresion dos corchetes
//${} $nome {$$nomevariablevariable}
echo "o valor de \$a é $a e o valor de \$\$a ou \$b é ${$a} $b {$$a}";
