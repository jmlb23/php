<?php

//as referecias son un alias dunha variable
//se modificamos o contido dunha referencia modificamos o orixe

// e podemos facer aritmetica de punteiros
$v = 5;
//s apunta o contido de v
$s =& $v;
// se modificamos s modificamos v
++$s;

echo $v."<br/>";


//pasando por refencia valores a unha funcion
//indicamos no parametro da funcion e cando damos os argumentos xa non fai falla indicarllo
//coma en c++ non ten sentido a unha funcion declarada como
// int h(int* v); pasarlle h(*a) xa que pasamos a referencia e non o contido
function ref(&$b){
	$b++;
}
$x = 5;
//pasamos o valor que a funcion recive por referencia non por copia
//na chamada a funcion non hai ningun operador de referencia
//en php 5.3 podiamos pasar unha referencia pero daba un notice e en php 5.4 o call time pass by ref non existe da
//un fatal error
ref($x);
//non fai falla o return xa que apunta directamente o contido da variable pasada e se a modificamos no interior da funcion
//queda modificada no orixe
echo $x."<br/>";

//sen referencias pasando o valor por copia

function senRef($a){
	$a++;
}
$h=5;
senRef($h);
echo $h;

//algo moi poderoso que podemos facer coas referencias e cambiar nun foreach cada valor
echo "<hr/>";
$array =[1,2,3,4,5];

//antes so podiamos facelo desta forma 
$cont=0;
foreach($array as $valor){
	$array[$cont]= rand(5,10);
	$cont++;
}

var_dump($array);

echo "<hr/>";
//non fai falla dende php 5.4 usar $array[i]=novo_valor
//foreach por referencia
foreach($array as &$valor){
	//estamos modificando directamente cada valor do array
	$valor = rand(5,10);
}

var_dump($array);

echo "<hr/>";
$a= 45;
function passRef(&$v){
	//o que estamos facendo e que o paramentro que é unha variable do ambito da funcion
	//sexa en php un alias para o contido de $a asi que se modificamos o parametro
	//sera modificado $a
	$v++;
}

passRef($a);

echo $a;
//temos que entender en php as referencias como simples alias a un contido o que apunta tanto a variable
//referenciada como a que referencia
echo "<br/><br/>";
//non funciona porque pasamoslle o parametro e vai ter ese alias dentro da funcion pero non hai forma no ambito da chamada para que
//nos asigne o valor xa que en php non hai punteiros solo alias
$baz =5;
function foo(&$var){
	$var =& $GLOBALS["baz"];
}

$bar=0;

foo($bar);

echo $bar;


//notar que o comportamento de global x; vs $GLOBALS['x'] é diferente nas referencias

$glo = 5;
//compo podemos observar coa palabra global so é visible a asignacion por referencia
//dentro do ambito da funcion
function g(){
	global $glo;
	$loc = 56;
	$glo =& $loc;
}

g();

echo $glo;



$glo2 = 5;
//co uso do array globals estamos usando directamente a variable para que apunte o contido
function g2(){
	$loc2 = 56;
	$GLOBALS['glo2'] =& $loc2;
}

g2();

echo $glo2;

echo "<hr/>";
//ainda que non é estrictamente unha asignacion por referencia podemos na declaracion dun
//(xa que collemos o contido da variable e metemolo no array)
//array usar o operador de referencia para asignar os compoñentes do mesmo

$valores_array = array(4,5);
//acordarse de que se as chaves non son literais enteiros teñen que ir entre comiñas
$valor = [&$valores_array[0],&$valores_array[1]];
//no vardump vemos se a asignacion é por referencia
var_dump($valor);


//coidado coas referencias os elementos dos arrays
//nun valor escalar normal se asignamos por referencia a unha variable
//e a unha terceira lle asignamos a variable que referencia
//e facemos un cambio non se modifica
//cun exemplo é mais claro
echo "<hr/>";

$v = 5;
$b =& $v;
$c = $b;

$c+=2;

echo $v;

//pero nun array é distinto
//se hai unha referencia a algun dos elementos do array e creamos unha nova variable 
//e asignamoslle a variable que conten o array e dende esta modificamos algun elemento
//é como se o motor de php collese as posibles referencias exitentes o array e asginase en
//vez de por copia por referencia a eses elementos que teñen outro "alias"
//mira se hai referencias a cada elemento do array asignado e se existen usas

//creamos un array
$arr = array(1);
//asignamos por referencia a unha variable o elemento x
$a =& $arr[0];
//creamos unha copia do array e en teoria faise por copia a asignacion
$arr2 = $arr;
//incrementamos o elemento do segundo array
$arr2[0]++;
//sorpresa como hai unha referencia usa fai unha asignacion por referencia a variable asinada por referencia
//fai algo como arr[0] =& a ;
echo $a;


//o comportamento por defecto sen referencias os elementos do primeiro
//array vemos que é unha asignacion por copia normal
//o comportamento por defecto dos escalares
echo "<hr/><hr/>";

$ab = array(5,6,7);

$ba = $ab;
$ba[0]++;
$ba[1]++;
$ba[2]++;
var_dump($ab);

echo "<hr/>";
//o unico que podemos pasar por referencia a unha funcion son:
//	1 variables
//	2 as expresions que leven new xa que o new devolve unha referencia
//	3 unha chamada a unha funcion que devolva unha referencia

//exemplo do 3
//asinaselle por referencia o valor devolto por w_ref que é unha referencia
//a $v que logo é incrmentdo
function w(&$e){
	$e++;
	echo $e;
}
function w_no_ref(){
	$v = 5;
	return $v;
}
function &w_ref(){
	$v = 5;
	return $v;
}
$b=5;
$a =& $b;
w(w_ref());
w(w_no_ref());//fatal error desde php 5.0.5 devolve un literal
w($a);//é un alias é unha referencia de php
w($h=5);//é unha expresion non da fatal error
w($b);//asignase por referencia o paremetro $e =& $b
//w(5);//fatal error xa que non hai referencia posible a un literal

//ter en conta que en php as referencias non son punteiros son so alias
//usalos non por motivo de rendemento que é moi pouco probable que xurda un caso
//xa que o motor de php encargase de optimizar
//usar as referencias so se hai unha razon tecnica de peso
//non melloran o rendemento é mais as referencias de php
//son mais lentas que a asignacion por copia
