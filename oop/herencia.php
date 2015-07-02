<?php
//moito coidado porque en php non é como en java
//no que o super sempre se executa e redefinimos o constructor na clase filla
//ten que ter como minimo os mesmos parametros que a clase pai
//en php non funciona asi
//non temos un constructor por defecto herdado do pai
//non hai constructor por defecto que meta o interprete se non se crea un
//e por defecto non hai unha clase base como en java da que todas as clases herdan por defecto
//o modelo de obxetos e clases é parecido o de c++
//non hai unha clase "object" da que todas as clases hernden
/**
@link http://stackoverflow.com/questions/7909073/why-php-has-no-default-constructor
*/
class persoa{
	public function __construct($nome){
		//parent::__construct(); proba do concepto da chamada o constructor da clase pai
		
		echo $nome;

	}
}

class Profesor extends persoa{
	public function __construct(){
		//coidado que se non chamamos nos con parent o constructor da clase pai
		//este non se pasa por defecto  non hai chamada por defecto o constructor da clase pai
		//COIDADOOO!!!
		//somos nos os encargados de chamalo explicitamente
		parent::__construct("pepe");
	}
}

$a = new Profesor("fsfdf");//recordar que se lle pasamos argumentos de mais a unha funcion ou metodo en php
//non da erro simplemente colleos por orde e os que sobren ignoraos
