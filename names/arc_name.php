<?php
//probaremos como resolve php os namespace
namespace Proba\b\sub;
echo "estamos no namespace ".__NAMESPACE__."<br/>";//aparece no outro arquvo xa que o include introduce o codigo tal cual
const FOO = 1;
function foo(){
	echo "hola dende o primeiro"."<br/>";
}
class Foo{
	static function metodo_statico(){
		echo "estamos no primeiro ".__CLASS__."<br/>";
	}
}
