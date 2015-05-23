<?php
//cando usamos as contantantes predefinidas en php refentes a clase metodos estan full cualified co nome do namespace
namespace ProbaNome;

echo "estamos no namespace ".__NAMESPACE__."<br/>";

class Proba{

	//por defecto en php todo é public nunha clase
	//é mala practica non indicar implicitamente o nivel de acceso
	
	//declaramos un atributo vai conter o numero da liña
	private $a =__LINE__;

	public function __construct(){
		echo "construindo a clase ".__CLASS__."<br/>";
	}

	public function setA($a){
		echo "estamos no metodo ".__METHOD__."<br/>";
		$this->a = $a;
	}

	public function getA(){
		//recordar que php o ser unha linguaxe con tipado dinamico cada variable que usemos detro dun metedo é como
		//nun linguaxe estatica declarar tipo e variable
		echo "estamos no metodo ".__METHOD__."<br/>";
		return $this->a;
	}
	/*
	o desturctor é chamado cando se alcanza a fin do script ou uso do obxeto ou se fai un unset
	*/
	public function __destruct(){
		echo "destruindo a clase ".__CLASS__."<br/>";
	}
}
//como non ten parametros omitimos os parentesis
$clase = new Proba;
unset($clase);
echo "ante de facer o set o atributo ten o valor ".$clase->getA()."<br/>";
$clase->setA(5);
echo "despois de facer o set o atributo o valor é ".$clase->getA()."<br/>";

