<?php
namespace dinamico;
function exemplo(){
	echo "estamos en ".__FUNCTION__."<br/>";
}


class proba{
	const V = "Hola dende ".__CLASS__;
	public function __construct(){
		echo "hola dende a clase ".__CLASS__."<br/>";
	}
	public static function estatica(){
		echo "hola dende a clase ".__METHOD__."<br/>";
	}

	public function instancia(){
		echo "hola dende a clase ".__METHOD__."<br/>";
	}

}
const CONS = "5a";
echo "aqui estan os compoñentes do namespace global"."<br/>";
include("dinamico.php");

echo "aqui estan os compoñentes do namespace co nome dinamico"."<br/>";
//o usar comiñar dobres temos que espacar o backslash do delimitador do namespace
//xa que son as comiñas de expansion de variables
$a = "\\dinamico\\exemplo";
$a();

$a = "\\dinamico\\proba";
//non fai falla poñer o namespace os metodos como en c++ nos prototipos
$b = "estatica";
$c = "instancia";
$v = new $a;
$a::$b();
$v->$c();

echo constant("\\dinamico\\CONS");
echo "<br/>";
echo constant("\\dinamico\\proba::V");
echo "<br/>____________________________________<br/>";
echo "<br/>proba de full qualified e qualified<br/>";
echo "<br/>____________________________________<br/>";
//un full qualified name \namespace\clase resolvese a un qualified name namespace\clase
//exemplo
echo constant("\\dinamico\\CONS");
echo "<br/>";
echo constant("\\dinamico\\proba::V");
//son equivalentes
echo "<br/>";
echo constant("dinamico\\CONS");
echo "<br/>";
echo constant("dinamico\\proba::V");
echo "<hr/>proba coa resolucion de nomes coas clases<hr>";
//a resolucion de nomes como me parecia no documento arc_name2.php so funciona con funcions e constantes
//noutras palabras se neste namespace facemos unha chamada a strlen e non esta neste declarada outra funcion php chama
//a do espazo de nomes global e nas variables e constanstes tamen
//pero as clases non funciona da mesma maneira e hai que indicalo de maneira explicita 
//co backslash para indicar que nos referimos univocamente
//a clase global


/*******************************************************************************************************************/
//por facer un simil os namespaces funcionan de maneira moi similar a estructura de directorios nun GNU/linux
//se estamos nun directorio e facemos uso dunha ruta relativa vai buscar ese elemento no directorio actual o igual que fai php
// se usamos unha ruta absolta dende a raiz vai /etc vai buscas na raiz ese elemento o igual que en php new \Exception busca no
//espazo de nomes global
//se e so qualified e o mesmo que facer se estamos en ~ e facemos cd Escritorio/kk mira nese directorio por ese elemento no actual
//e se é unqualified sen nengun slash php para as clases mira so no namespace actual como se estamos no home e facemos cd kk mira no
//actual
//en php os 3 tipos de nomenclaturas son () exemplificado en name2.php
//1 fully qualified \StdClass 
//2 qualified namespace\elemento
//3 unqualified
/*******************************************************************************************************************/
$h = new \StdClass();//chamamos explicitamente a global
//recordar que so php é casensitive nas variables
//echo Cons;
var_dump($h);
$h = new stdClass(); //intentamos chamar a global con unqualified pero da fatal error porque non o atopa neste scope

