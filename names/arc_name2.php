<?php
namespace Proba\b;
include ("arc_name.php");
echo "estamos no namespace ".__NAMESPACE__."<br/>";
const FOO = 2;
function foo(){
	echo "hola dende o segundo";
}
class Foo{
	static function metodo_statico(){
		echo "estamos no segundo ".__CLASS__."<br/>";//sempre se imprime o qualified name da clase namespace+clase
	}
}

foo();//se non poñemos nada precedendo "unqualified" resolve buscando no namespace actual a funcion
echo "<br/>";
Foo::metodo_statico();//se non poñemos nada precedendo "unqualified" resolve buscando no namespace actual a clase e o metodo correpondente
//no caso de colision temos que especificar o nome do namespace ou subnamespace dos metodos calses funcion etc para poder facer uso
//dos compoñentes do mesmo
//como en java se temos que usar duas clases date teremos que especificar o paquete completo
//tamen poderiamos facer uso do use e utilizar alias
sub\foo();//cando antepoñemos subnamespace xa non resolve o global busca se incluimos ese namespace e resolve co namespace axeitado
sub\Foo::metodo_statico();//igual coas clases e metodos

/*
	os fully qualified name levan a nomenclatura \__NAMESPACE__.__CLASS__
	e resolve php a __NAMESPACE__.__CLASS__
*/ 
//importante ter en conta de que se temos colision cunha funcion variable constante atributo clase ou metodo gobal e queremos
//facer uso dende un namespace desta teremos que antepoñer o backslash para indicar que pertence o epazo de nomes global

//se a resolucion dun compoñente dun namespace non satisfactoria ira o global para ver se existe
function strlen(){
	echo "fake strlen"."<br/>";
}

strlen();
echo \strlen("hola");

