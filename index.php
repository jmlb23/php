<?php

$var = 2;
//ter en conta que os \n son so para o cli e separar comandos no codigo fonte
//para que teña efecto visual na web teremos que meter un br
echo "expansion de vairiable ${var}<br/>";
//o final non fai falla meter as comiñas na nomenclatura do nowdoc
echo  <<<'NOWDOC'
aqui non hai expansion de variable no nowdoc
$var <br/>
NOWDOC;
echo <<<HEREDOC
aqui si temos expansionde variables
$var<br/>
HEREDOC;

//reutilizamos a variable xa que php ten un tipado dinamico e debil
$var = array('hola',null);
//unset($var[0]);//ter en conta que unset  elimina o elemento e o indice non é como poñer array[x] = null
//se intentamos aceder a un indice que non existe sairanos un notice
//curioso que podemos castear a unset porque non podemos castear implicitamente a null
//for($a=0; $a<sizeof($var); $a++) echo (unset)$var[$a]."<br/>";
for($a=0; $a<sizeof($var); $a++) echo $var[$a]."<br/>";

//ollo cos indices xa que so poden ser string ou integer e se o string  ten integer valido (por conseguite tamen un float) e casteado implicitamente a integer
$var = array(
	1 => "hola",
	va => "machaca",// ollo porque vai o ser php unha linguaxe debilmente tipada e dinamica interpreta va como o valor literal 'va' funciona pero é mala practica e casca un notice
	"2" => "casteado",
	"3" => "tamen" 
);

var_dump($var);

//como php é unha linguaxe dinamica na que non fai falla definir unha variable antes de usala dentro dunha funcion facemos uso dunha variable previamente definida
//non collera  por defecto o valor global xa que
//é como se nunha linguaxe tipada definisemos unha variable fora da funcion e dentro definisemos outra nova co mesmo nome
//se facemos uso dela coma nunha linguaxe tipada forte e estatica daranos un notice
//na programacion estructurada a unica forma e facer uso do array GLOBALS ou facer uso dunha variable global

//P.E.
function probaAmbito(){
	
	echo $GLOBALS['var'];
}

probaAmbito();

//probas con variable args
echo "<br/><br/>";

function varArgs(...$num){
	foreach($num as $numero) echo  $numero."<br/>";
}

varArgs(3,4,5,6,7);
