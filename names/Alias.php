<?php
namespace {
include("dinamico2.php");
use dinamico\proba as clase;
use function dinamico\exemplo as func;//a partires de php 5.6 podemos usar alias nas funcions
//use dinamico\exemplo as fun;//a partires de php 5.6 podemos usar alias nas funcions sen indicarlle explicitamente que é unha funcion
//non vai
use function dinamico\exemplo;//so en php 5.6 se pode facer un using explicito dunha funcion
use dinamico\exemplo as fun;//antes de  php 5.6 so podemos importar o nome da funcion
use dinamico\CONS as constante;//non funciona polo motivo de que asume que é un string e toma o literal do string
$a = new clase();//resolvese a dinamico\proba
$b = new dinamico\proba();
//echo constante;
func();
//fun(); asi non vai
exemplo();
//se xa usamos un alias non podemos usar o mesmo nome para definir outro elemento por problemas de colisions
/*********************************************************************************/
//so se pode usar alias coas clases e namespaces e apartires de php 5.6 explicitando que é unha funcion
/*********************************************************************************/
//fun();
//proba de que non se pode facer un use dun elemento que non sexa unha clase ou namespace
//facendo probas antes cun include si que vai porque include copia o contido tal cal e no dinamico2 fago un include
//de dinamico.php que ten todo nun namespace global e por iso funciona porque esta todo no namespace global
//recordar que os namespace non son como os package non mapean un directorio real pero si que é recomendable
//para cumplir as psr-0 e psr-4 e poder implementar o autoload
echo "<hr/>probas de concepto de use con funcions e constantes<hr/>";
exemplo();//proven do arquivo dinamico.php por eso resolve ben porque estan nese arquivo definidas no espazo de nomes gloobal
echo CONS;//""""""""""""""""""""""""""""""
use proba\H;
use proba\v;

//estos dous dan erro un un notice por undefined Constant e asume o literal
#echo H;
//este da un fatal por undefined function
//v();
//class clase{}//peta da un fatal error
//erroooo $nome_inocente = "name\n\Kk";// coidado coas comiñas dobres e a interpretacion dos caracteres escapados temos que escapar
//os caracteres especiais
$nome_inocente = "name\\n\Kk";
$k = new $nome_inocente;
}


namespace proba{
	const H = "valor";
	function v(){
		echo "hola dende proba";
	}
}

namespace name\n{
	class Kk{}
}
