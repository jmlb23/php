<?php
//os namespaces teñen que ser a primeira intrucion nun script
//excepto se hai un declare
//para facer uso dun namespace existe a palabra chave use
//non pode ir dentro dun metodo ou clase
//a declaracion de multiples namespaces faise con chaves e non poden ser anidados
namespace names;

//nos namespaces so poden estar constantes
const H = 34;

//funcions
function saudo(){
	echo "hola";
}
//clases
class X{
	public static $x = 0;
	public function __construct(){
		//podemos acceder con self static ou X e ::
		echo "hola dende a instancia numero ".X::$x++."<br/>";
	}
}

