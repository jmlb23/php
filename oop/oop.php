<?php
//definicion dunha clase en php
//ter en conta que en php non é como en java
//non se basa en directorios(paquetes) e a visibilidade entre clases non se
//indica nunha clase externa
//temos tres niveis de aceso public protected e private se non se pon nada
//por defeito é public o atributo ou funcion
//en php non hai main e existe un ambito global non ten porque estar todo nunha
//clase, podemos usar en php tanto o paradigma da oop ou da programacion
// estructurada indistintamente
function x(){
class Proba{
	
	private $valor = 5;

	public function getValor(){
		/*
		* ter en conta que se non usamos a pseudovariable
		* $this e chamamos o atributo sen o $this precendendo
		* o ser php un linguaxe con tipado dinamico
		* vai a entender que declaramos unha nova variable
		* co mesmo nome 
		* return $valor; non teria o resultado esperado
		* é mais da un notice por variable non definida
		*/
		//para acceder co $this facemos como para aceder no array GLOBALS non poñemos o dollar
		return $this->valor;
	}
}

$clase = new Proba;// o non ter constructor ou ser sin argumentos podemos omitiros parentesis
echo $clase->getValor();
}

x();
