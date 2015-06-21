<?php
//interpreta os caracteres especiais
$heredoc = <<<HERE
esto é un\nheredoc
HERE;
//interpretaos como literais
$nowdoc = <<<'NOW'
esto é un now\ndoc
NOW;

echo $heredoc."<br/>";
echo $nowdoc."<br/>";


//devolve a cadea o reves
echo strrev($nowdoc);
//xenera un numero pseudoaleatorio entre dous numeros os parametros son opcionais
echo rand(0,10)."<br/>";
// o que vamos a reemplazar, o que usamos para reemplazar, a cadea na que reemplazamos, outro parametro opcional é o numero de ocurrencias a que hai que substituir
echo str_replace(array("e","é"),"",$heredoc )."<br/>";
//cadea na que reemplazamos, con que reemplazamos, donde empezamos,(opcional) ate donde reemplazamos se non se pon vai ate o final
echo substr_replace($nowdoc, " hola ",5)."<br/>";
//pasaselle un string e devolve a cadea coa primeira letra desta en maiuscula, uppercasefirst
echo ucfirst($nowdoc)."<br/>";
//recibe unha cadea e devolve unha cadea na que todas as palabras comezan con maiuscula uppercasewords
echo ucwords($heredoc)."<br/>";
//recibe unha cadea e devolvea en maiusculas
echo strtoupper($heredoc)."<br/>";
//recibe unha cadea e devolvea en maiusculas
echo strtolower($nowdoc)."<br/>";
//concatenase co punto
echo $nowdoc.$heredoc."<br/>";
//tamen coa coma pero é mala practica
echo $nowdoc,$heredoc;

#comentario tipo shell ou perl
/*
coidado porque os comentarios multiringleira comentan as etiquetas de apertura e de cerre de php
?>

<?php

echo "hola mundo";
*/
echo "proba despois de comentario multiringleira";

//temos 3 conxuntos de tipo en php
//escalares
$string = "hola mundo";
$boolean = true;
$integer = 5;
$double = 3.4;

//compostos

$array = array(2,3,4,5); //que poden ser tipo asocitivo ou con indice numerico
$obxeto = new StdClass(); //son obxetos

//espciais
$nulo = null;
$resouce = fopen(".","r");//o que devolve por exemplo unha funcion como fopen que manexa ficheiros

//temos tamen pseudotipos number mixed callback array|object void que se usan nos manuais por motivos de lexivilidade

//en php 5.6 engadese o vardiact ou varargs en java
//declarase como en java String... args
//"tipo" varible que os conten
function x(...$x){
	foreach($x as $a){

		echo "$a<br/>";
	}
}
x(3,45,5,6);

//bolean so suporta true ou false
// e para castear podemos usar as palabras chaves bool boolean
//ter en conta que o casteo pode ser inecesario xa que php se hai unha expresion ou se usan operadores ou unha funcion
//xa castea implicitamente a boolean 1 true  0 false
//exemplo
//seria un false implicito o propio false, unha cadea valeira, unha cadea que conteña so un 0, un integer que conteña so un 0
//un double que conteña so un 0, un array valeiro, e en php 4 un obxeto sen atributos, e un elemento xml con etiquetas valeiras
if(1) echo "é casteado o un a un true"."<br/>";
if([3,4]) echo "é casteado o array non valeiro a un true"."<br/>";
var_dump((bool)1);
var_dump((boolean)1);


//os integers soportan vlaores enterios de -infinito a +infinito
//en php 5.4.0 engadiuse a posibilidade de usar literais binarios

//literal hexadecimal o numero vai precedido de 0x
echo "<br/>";
echo 0x1ab;
echo "<br/>";
//literal binario  o numero vai precedido de 0b
echo "<br/>";
echo 0b10101001;
echo "<br/>";
//literal octal  o numero vai precedido de 0 se vai un numero non valido en codificacion octal truncase o usase so o numero valido
echo "<br/>";
echo 0147;
echo "<br/>";

//ter en conta que se hai un overflow nun integer pasara a ser un float
//este seria un overflow en 64 bits OS
$numero = 92233720368547758070;

var_dump($numero);


//ter en conta que o resultado dunha division entre dous integers
// se non é exacta vai dar un float como resultado
//para ter a parte enteira do resultado temos que castear
//ou usar a funcion round que o que fai é redondear o enteiro mais preto
echo "<br/>";
var_dump(1/2);
//para castear a int podemos usar as palabras chaves int ou integer
var_dump((integer)(1/2));
var_dump(round(1/2));
var_dump(round(0.1));
//coidado con castear o resultado de fraccions xa que pode dar resultados estranos
//porque? porque usa o sismtema binario
var_dump((int)((0.1+0.7)*10));


///////////////////////
//	floats	     //
///////////////////////


//podemos usar varias notacions
$a = 2.456;
$b = 2.1e3;
$c = 7E-10;
//parametros opcionales nunha funcion
function limpa($b=10){
	for($a=0;$a<$b;$a++){
		echo "<br/>";
	}

}

limpa();

var_dump($a);
var_dump($b);
var_dump($c);

//cando necesitemos usar numeros reais (floats) en operacions tal cual son en base 10 pode dar certa perda de precision
//xa que non teñen represetacion exacta en binario e e o que se usa por detras para almacenar todo

var_dump(((0.1+0.7)*10));
//nota
//non comparar nunca dous floats e nunca fiarse do que devolve unha operacion entre floats en php
//usar valores absolutos a poder ser
//o ser represantados en binario para o seu almacenamento é probable que exista unha perda de precision coidado
//http://floating-point-gui.de/
limpa();
//abs devolve o valor absoluto se int en forma integer se é un float en notacion decimal cientifica en forma enteira
echo abs(1.23456789-1.23456780);
//para aqueles resultados con operacions con floats que non den un valor numerico pode devolver a operacion un nan not a number
limpa();
//exemplo o acos() funcion so admite valores entre un e menos un e se non devolve un nan
echo acos(5);


					////////////////////////////
					//	Strings php	  //
					////////////////////////////


//en php os string son series de caracteres e cada caracter e o mesmo que un byte
//php soporta strings de como maximo 256 caracteres
//a lonxitude maxima de caracteres en php é de 2gb

$string[2] = "2";

echo $string;

limpa();

//devolve o caracter correspondente o integer pasado
echo chr(101);
echo "<br/>";
//devolve o integer que ten como representacion ASCII
echo ord("e");


//probando as referencias
$a = 5;
//sen paso por referecia o valor que se asigna seria por copia 
function ref(&$b){
	$b = 4;

}
ref($a);

echo $a;

class Hola{
	//se casteamos
	public $a;//non se lle antepon nada
	private $b;//anteponselle o nome da clase
	protected $c;//anteponselle un asterisco
}

echo "<br/>";
var_dump((array)new Hola());

//podemos castear un array a object e vainos a dar como tipo o obxeto standar StdClass
echo "<br/>";
$ar = array(4,'hola'=>6,true=>3);
echo "<br/>";
var_dump((object)$ar);

echo "<br/>";
//tamen podemos castear calquer tipo scalar a obejct
//os objects quedan intactos e os arrays pasan a ser
//objects con cada key como atributo e cada value como
//valor de cada atributo

$val = 5;
var_dump((object)$val);
