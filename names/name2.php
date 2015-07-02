<?php
namespace h{
	function x(){
		echo "hola dende ".__METHOD__."<br/>";
	}
	class stdClass{
		function __construct(){
			echo "hola dende ".__CLASS__."<br/>";
		}
	}
	//resolve o propio porque hai que explicitar un full qualified para referirnos o elemento do espazo de nomes global
	$v = new stdClass();
}

namespace{
	function x(){
		echo "adeus"."<br/>";
	}
	echo \h\x();
	echo h\x();
	echo x();

	$a = new \h\stdClass();
	$b = new h\stdClass();//resolve da seguinte forma estamo no global xa que é o que non ten nome e o estarmos no mesmo ficheiro
	//é como buscar un elemento no dir actual
	var_dump($c = new stdClass());//resolve ben porque estamos no global e non fai falla facer un full qualified
}
namespace v{
	//falla porque intenta cargar unha clase con ese nome neste espazo de nomes
	$h = new stdClass();
}

//non podemos crear namespaces anidados


namespace h{
	namespace w{
		class clas{}
	}
}
