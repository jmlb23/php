<?php

function ex(){
	//igual que java ou c++ en canto a excepcion salta abandona o try
	//e vai o catch correspondete para ser tratada
	try{
		throw new Exception("lanzando unha excepcion<br/>");
	}catch(Exception $e){
		echo "esta é a mensaxe da excepcion".$e->getMessage();
	}finally{
		echo "esto sempre se executa";
	}
}

ex();

echo "estos son os metodos da clase exception por defecto so se pode sobreescribir o toString() e os atributos";
echo "<pre>";
var_dump(get_class_methods("Exception"));
var_dump(new Exception());

echo "</pre>";
class ExceptionPropia extends Exception{
	//o non termos constructor por defecto en php temos a obriga de se queremos mandar parametros a constructor da clase
	//pai temos que facer unha chamada explicita o mesmo
	/**
	*extendemos unha exception temos que pasarlle a mensaxe e os outros dous son opcionais o codigo e a excepcion previa
	*/
	public function __construct($message, $code=0,Exception $previous= null){
		parent::__construct($message,$code,$previous);
	}
	//o unico dos metodos que se pode sobreescribir da exception
	public function __toString(){
		return __CLASS__." co mensaxe ".$this->message;		
	}
}

//throw new ExceptionPropia("hola excepcion",0,null);
//abandona o try inmediatamente e non se excuta o resto do codigo e vai o catch que teña o tratamento axeitado
//se queremos finalizar a excucion como en c++ e java etc o try catch é so unha estructura de control para as excepcions
//teremos que finalizar nos a execucion do script
//se usamos un die(exit) nun catch obiamente non se chega a executar o finally xa que para a excucion e o fluxo normal do programa

try{
	//throw new ExceptionPropia("mensaxe da excepcion propia");
	throw new PdoException();
//podemos capturar cunha superclase calquera excepcion que sexa subclase desta como en java e noutras linguaxes
}catch(ExceptionPropia $e){
	echo $e->getMessage()."<br/>";
}catch(PdoException $e){//se relanzamos a excepcion no catch e non damos un tratamento obviamente da un fatal error
			//si que se excuta o finally como en java para podermos liberar recursos etc se o tratamento
			//da excepcion non é satisfactorio
	echo "nova excepcion tipo pdo"."<br/>";
	#throw $e;//un throw sin un try lanza a excepcion e o non ser capturada produce un fatal que para a execucion do script
	//por defecto o toString das excepcions prebuild amosanos o nome da clase a liña o arquivo que no que se produciu e a pila de
	//chamadas
	#exit("saimos do script o finally non se executa");

}catch(Exception $e){
	echo "excepcion xeral"."<br/>";
}finally{
	echo "esto sempre se executa"."<br/>";
}

//tamen funciona a formula try finally
//o non termos un catch que trate a excepcion
//para o fluxo de excucion normal do programa cun fatal error por excepcion non capturada
/*try{
	throw new Exception("nun try finally omitindo os catch");
}finally{
	echo "hola";
}
*/
echo "<hr/><hr/>";
//implementacion simple dunha funcion que lanza unha excepcion para poder ver como é o fluxo de execucion
//dun try catch finally
function Excepcion($numero){
	if(is_numeric($numero)) echo "o teu numero é ".$numero;
	else{
		throw new Exception("excepcion numerica"."<br/>");
	}
}
/**
*o link é sobre javascript pero parece que se cumple o mesmo patron de comportamento na maioria de linguaxes
*(hai que probalo en java e c++)
*en java fai o mesmo pero hai que facer mais probas
*@link https://github.com/jmlb23/java/blob/master/Excepcions.java
*@link http://www.bennadel.com/blog/2154-i-finally-understand-the-finally-part-of-a-try-catch-control-statement.htm
*as conclusions que podemos sacar son:
*se temos un return no catch e temos finally e outro return no mesmo devolvelle o control o finally non a funcion
*o catch ten que estar supeditado o finally se existe e non a funcion para devolver o control cun return
*o que retornamos no catch non atopo forma de recollelo so se retorna o control non o valor
*----------------------------------------------------------------------------------------------------------------
*se non hai return no finally enton si que recolle o valor retornado no catch aparte do control
*e como se machacase o valor do return no finally o valor retornado no catch
*----------------------------------------------------------------------------------------------------------------
*se relanzo a excepcion no catch e hai return no finally non se relanza
*en cambio se non hai return no finally si que se relanza coas consecuencias xa coñecidas (fatal error)
*/
function test(){
	try{
		Excepcion("proba");
	}catch(Exception $e){
		//throw $e;
		echo "introduce so numeros"."<br/>";
		return "retorno no catch"."<br/>";
	}finally{
		echo "estamos no finally"."<br/>";
		//return "retorno no finally"."<br/>";
	}
}

echo test();
