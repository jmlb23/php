<?php
//en php temos referecnias non son como en c ou c++ que manexamos as direccions de memoria reais
//en php so son alias ou distintos nomes para referirse a un mesmo contido
//no manual di que o concepto mais parecido son os arquivos e nomes de arquivos en unix
//os nomes das variables son entradas de directorio mentres que o contido da variable é o arquivo en si
//as referecias serian como os enlaces duros
/**
*@link http://php.net/manual/es/language.references.whatare.php
*/
//podemos usar as referecias de tre maneiras

//1. Asignando por referencia: facemos que duas variables apunten o mesmo contido
//o concepto non que "b" apunte a "a" como en c++ ou c
//aqui é un pouco diferente xa que apuntan o mesmo contido as duas
//non apunta unha variable a outra
//se se asigna pasa ou retorna unha variable que non existe por referencia esta é creada
$a = 5;
$b =& $a;
$a+=2;
//o mesmo concepto é aplicado o valor retornado por unha funcion que retorna por referncia
function &x(/*& asi si que funcionaria*/$v){//coidado porque o valor do argumento vai por copia por defecto TIMMY!!!!
		//conclusion:
		//o valor do parametro vai por copia(obviamente se non indicamos nada) e o que retorna é unha referencia
		//o valor da variable declarada no interior da funcion
		//non caer no erro inicial de pensar que devolve unha referencia o parametro pasado porque o parametro
		//non o pasamos por referencia se non por copia
		//se o pasamos por referecia si que funciona como pensaba
	$v+=2;
	return $v;
}
//esto é co planteamento errado
$w=4;
$g=x($w);//non da erro como pensaba xa que a variable esta creada é $r=5
echo $w;


//en php temos a liberdade de poder retornar unha referencia en vez dun valor por copia
//como devolvemos unha referencia non podemos devolver un literal tal cual
//temos que devolver unha variable
//php non permite manipular as direccions de memoria directamente nin aritmetica de punteiros como en c++
//a sintaxe é a seguinte usamos o operador de referecnia & anteposto o nome da funcion para indicar
//que é unha funcion que devolve unha referencia a unha variable
function &ref(){
	return $valor;
}
//para asginar
//en php a asignacion por referencia non é mais que un alias da vairable
//manipulamos direcatmente a outra variable
$a =& ref();
