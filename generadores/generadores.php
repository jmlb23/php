<?php
//os xeneradores xorden como solucion o problema de implementar un iterator
//teñen a vantaxe sobre estos de que o aforro en memoria é notable
//a nivel de performance hai moita diversidade de opinions
//pero pode conlevar un incremento da mellora de rendemento a nivel de tempo
//con respeto os iterators
//o corazon dos xeneradores é a palabra yield
//funciona como un return pero en vez de devolver un valor e o control a estructura
//superior so pausa a funcion e devolve o valor e volve de novo a funcion
//ocupa menos memoria porque imaxinemos que tivermos que iterar sobre un ficheiro enorme de gb
//se usasemos un iterator cargariamos todo o arquivo en memoria e iterariamos sobre el
//un generator o que fai é se o recorremos liña a liña e retornar o valor e volver a funcion e retornar unha
//nova liña sin necesidade de cargalo en memoria xa que devolve cada liña indvidualmente
/**
*o yield tranforma a funcion nun xenerador e cando esta é chamada devolve un obxeto que pode ser iterado cun foreach
*php chama cada vez que necesite un valor a esta funcion e garda o estado cada vez que fai un yield(cede)
*asi que cando continue a execucion continua no seguinte valor requerido
*/
function genera($valor){
	for($a=1;$a<$valor;$a++) yield $a;
	//para que yield forme parte dunha expresion de asginacion valida
	//ten que estar rodeado por parenteses exemplo:
	//$a = (yield $a) correcto
	//$a = yield $a incorrecto
	//un xenerador non pode devolver un valor da un erro de compilacion
	//pero si que pode devolver o control cun return valeiro
	
}
//echo genera(2); o yield é o que converte unha funcion nun generator
//como describe a wikipedia para devolverm un conxunto de valores nunha funcion
//o normal e devolver un array pero esto ocupa moita memoria
//o generador permite devolver valor a valor co yield coa conseguinte aforro e memoria
//é interesante no manual de php ver como explica como podemos pasar de usar range para xenerar
//uns numeros entre un rango, o problema ven cando o rango é moi grande xa que en php cada elemento
//do array ocupa un byte e se o rango é moi grande devolver una array de moitos megas pode ser un problema
//o xenerador permitenos devolver valor a valor e que so ocupe de cada vez a memoria do valor devolto
/**
* links complementarios ou interesantes
*@link https://en.wikipedia.org/wiki/Generator_%28computer_programming%29
*@link http://php.net/manual/en/language.generators.overview.php
*/
foreach(genera(5) as $key=>$value){//importante entender que cada vez que devolve un valor pausase a execucion do xenerador
			 //e logo o control volve de novo o xenerador asi ate o rango indicado
	echo "$key=>$value"."<br/>";
	//cando se devolven os valores e se usa tamen a chave hai unha congluencia como nun array non asocitivo normal
}


//a potencia do yield non se limita so o xa visto tamen pode devolver pares de tipo chave=>valor
//tamen podemos facer yields de nulos
function mandameGet(){
	foreach($_GET as $key=>$value){
		//aplicase o mesmo da asignacion e os parenteses
		yield $key=>$value;
	}
}

foreach(mandameGet() as $key=>$value){
	echo "$key=>$value"."<br/>";
}

//intersante tamen a alternativa de poder ceder(yield) por referencia

