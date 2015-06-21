<?php
/*
* as funcions seguen a nomenclatura normal de php e das linguaxes de progrmamacion menos que non pode usar o dollar como parte do
* nome xa que entraria en conflicto co interprete, na forma que ten de identificar as variables 
*/

//en php non é como en c podemos referenciar unha funcion que non foi definida anteriormente excepto se esta noutro ambito
//ata php 5.6 o valor de retorno averguao o interprete en php 7 teran valor de retorno e vai despois dos parenteses
//dos argumentos
exemplo(4);
function exemplo($p){
	//podemos acceder os argumentos das funcions
	//con func_get_args(); que devolve un array con todos os argumentos da funcion
	//con func_get_arg(); que pasandolle o numero do agumento devolveo so recorre o array asi que é basado en 0
	//con func_num_args(); que devolve o numero de agumentos da funcion
	//php se pasamos parametros a maiores non da erro
	echo "numero de argumentos da funcion ".func_num_args()."<br/>os argumentos da funcion ".var_dump(func_get_args())."<br/>argumento numero 1 da funcion ".func_get_arg(0);
	echo $p."<br/>";
}
exemplo("hola mundo<br/>","adios mundo");
//coidado!! xa que todas as funcions non metodos estan no ambito global asi que podemos referenciar h dende fora
//non é como en java que so existen no ambito no que estan
//curioso as funcions e as construcions da linguaxe como echo non son sensibles a maiusculas a diferença das variables
function v(){
	//h non vai a existir ata que chamemos a v
	function h(){
		echo "hola dende ".__FUNCTION__;		
	}
}

#h();//produce un fatal error que denten a execucion do script

v();

h();

echo "<br/>";
//php admite recursividade
//e como c++ admite parametros con valores por defecto
function recur($a){
	if($a==0) return;
	else {
		echo $a."<br/>";
		recur($a-1);
	}
}
recur(20);
