<?php
//os traits introducironse na version 5.4
//aparecen para tentar solucionar o problema da herencia multiple
//que php a diferencia de c++ non soporta
//asi podemos usar o codigo presente nun trait sen ter que depender de implementar unha interfaz
//ou extender unha clase para que implemente uns metodos ou atributos
//facemos referencia o seu uso coa palabra use
trait Hola{
	public function holaTrait(){
		echo "hola dende o trait ".__TRAIT__;
	}
}

class Pro{
	//a diferenza do use do namespace aqui usamolo dentro da clase
	//podemos usar alias no interior e conservar o nome da funcion
	use Hola{
		holaTrait as t;
	}
	//coidado que non hai sobre escritura xa que non hai herencia
	public function holaTrait(){
		echo "hola dende o trait ".__METHOD__;
	}
}

$x = new Pro;
#$a = new Hola(); non se poden instaciar os traits
$x->t();//salta e executase no ambito do trait o igual que nas clases e instacias etc fundamental na oop
$x->holaTrait();

