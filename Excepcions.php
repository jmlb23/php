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
class ExceptionNum extends Exception{
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

throw new ExceptionNum("hola excepcion",0,null);

