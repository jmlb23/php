<?php
//php ten moita potencia a hora de crear chamadas a funcions clases e meotdos dinamicamente mediante variables
//se unha varible conten un string cun nome de funcion que existe este resolverase a chamar a funcion

function exemplo(){
	echo "estamos en ".__FUNCTION__."<br/>";
}

$a = "exemplo";
$a();

//da misma maneira se usamos o nome dunha clase nun stirng e facemos uso desta nunha creacion dunha instancia con new
//ou chamamos de maneira estatica a un metodo resolvese como se usasemos a clase en si

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
const CONS = 5;
//os parentesis teñen que ir na chamada non na asignacion
$a = "proba";
$b = "estatica";
$c = "instancia";
$v = new $a;
$a::$b();
$v->$c();

//curioso constant devolve o valor dunha constante damoslle o nome da constante e reolveo devolvendo o valor
echo constant("CONS");
echo "<br/>";
//tamen funciona coas constantes dunha clase
echo constant("proba::V");
