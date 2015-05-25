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
