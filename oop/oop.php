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
		private static $valorStatico = 5;
	
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
		//non ten mais que decir que a pseudovariable $this non esta dispoñible en contextos estaticos
		//teremos que usar o operador de resolucion de ambito que se usa para contextos staticos e cambios
		//de ambitos
		//a diferencia de java o operador de acceso nos obxetos non é o punto xa que é o de concatenacion
		//usase -> e :: e a diferencia tamen de java non se usa o mesmo para acceso a atributos e metodos
		//estaticos e de instacia non esta sobrecargado como o . en java
		//ademais o :: serve para acesso de namespaces o seu contido
		//podemos usalo con parent:: static:: self::
		public static function probaStatic(){
			return Proba::$valorStatico;
			//return $this->valor;
		}
	}
	
	$clase = new Proba;// o non ter constructor ou ser sin argumentos podemos omitiros parentesis
	echo $clase->getValor();
	echo Proba::probaStatic();
}

x();
