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
