<?php
//para poñer nun arquivo varios namespaces teremos que usar as chaves para delimitalo
namespace espazo{
	echo "estamos no ".__NAMESPACE__;
}
//se temos un namespace delimitado por chaves
//non pode ir codigo fora del
//para poñelo no namespace global indicamolo cun namespace sen nome que indica que é o global
namespace{
include("namespaces.php");
//exemplo practico de use e as
//podemos usar a forma cualified ou full cualified dependedo do ambito
// no que invoquemos os nomes do namespace
//membros dun namespace
//podemos facer unha declaracion deste tipo
//ollo porque use non funcuina a nivel de aquivo como import ou include
//faise uso valla a rendundancia de algun dos compoñentes do namespace
//lexicamente ten outro significado que using en c++ no que invocando co name
//space por defecto
//using namespace x
use names\X as clase;//dandolle un alias o elemento que usamos do namespace
use names\X;
$h = new \names\X();
$v = new names\X();
$c = new clase;
//ou sen calificar se estamos no global e nos referimos a un elemento global
//ou se estamos dentro do propio namespace
function x(){
	//use names as n; ollo ten que estar no ambito global
}

}
