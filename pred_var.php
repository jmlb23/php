<?php

//php ten varias variables predefinidas
//php intenta asi representar dunha maneira sinxela as variables externas variables de entorno
//mensaxes de erro ate o ultimo header enviado

//temos varios tipos

//as superglobais que son aquelas variables que estan dispoñibles en todos os ambitos dun script en php
//é dicir que no ambito dunha funcion ou clase ect non teriamos necesidade de aceder o espazo de nomes global
//para acceder a elas mediante global ou GLOBALS['x']

//estas son

/*echo "<pre>";
var_dump(
$GLOBALS, //referencia todas as variables que estan definidas no espazo de nomes global array que conten en chave valor o nome e o valor da variable sempre existiu en php
$_SERVER, //antes de php 5.4 (a posteri desapareceu)$HTTP_SERVER_VARS a diferencia e que non era superglobal tamen existia e tiña o mesmo contido que $_SERVER
//é un array asociativo no que temos a informacion relativa a os headers paths e localizacions do script
//as entradas deste array son creadas polo servidor
//coidado porque como este array encheo o sevidor dependemos de que este o encha coas caracteristicas dispoñibles
//poida que algunhas non esten dispoñible ou que aparezan outras non listadas no manual de php
//as variables xeneradas son as que aparecen na especificacion http://www.faqs.org/rfcs/rfc3875.html (especificacion do cgi)

$_GET,
$_POST,
$_FILES,
$_COOKIE,
$_REQUEST,
$_ENV

);
echo "</pre>";
*/

//exemplo de globals

/*$v = "estamos no espazo de nomes global";

function pro(){
	$v = "ambito da funcion";
	echo $GLOBALS['v']."<br/>";
	echo $v;
}
pro();

echo "<hr/>";

echo "server superglobal";
echo "<pre>";
//precaucion porque en php cli pode que algunha destas variables non este dispoñible
var_dump($_SERVER);
echo "</pre>";
*/
//indices do array $_SERVER explicados un por un
echo $_SERVER['PHP_SELF']."<br/>";//o nome do script en actualmente en execucion relativa o documentroot do servidor virutualhost etc 
//no meu caso estou na raiz do document root dun virutalhost que usa o documentroot /var/www/php
//o script esta en /var/www/php/nome.php enton o nome sera x.php
//sempre relativo o documentroot
//a constante __FILE__ conten a ruta completa relativa a raiz do sistema de arquivos
//en cli conten o nome do script se é unha version de php >= 4.3.0 antes non estaba dispoñible en cli
echo __FILE__;

//argv o igual que o estilo de c é un array que conten os argmentos pasados o script via cli se facemos unha peticion get enton colle o querystring do navegador
//o segundo non o din conseguido por agora
var_dump($_SERVER['argv']);

//argc como en c conten o numero de argumentos pasados o script se esta en cli
echo($_SERVER['argc'].PHP_EOL);
//conten o version de cgi que executa o sevidor
echo $_SERVER['GATEWAY_INTERFACE']."<br/>";
//a ip do servidor na que se executa o script
echo $_SERVER["SERVER_ADDR"]."<br/>";
//o nome do servidor no que se executa o script se é un virtualhost toma o valor definido por ServerName no virtual host se é un apache
echo $_SERVER["SERVER_NAME"]."<br/>";
//a cadea que devolva o servidor nos headers que o identifica
echo $_SERVER["SERVER_SOFTWARE"]."<br/>";
//nome e version ou revision do protocolo polo que se fixo a request a paxina
echo $_SERVER["SERVER_PROTOCOL"]."<br/>";
//o metodo que se usou para accesder a paxina
//ollo porque se usamos o metodo head de http para unha request o script acaba despois de que se complete o envio do header como é obvio
//antes que se amose nada ou renderice no navegador
echo $_SERVER["REQUEST_METHOD"]."<br/>";
//devolve o timestamp do momento no empezou esta. dispoñible dende php 5.1.0
echo $_SERVER["REQUEST_TIME"]."<br/>";

//o timestamp de comezo da request con precision de milisegundos, dispoñible dende php 5.4.0
echo $_SERVER["REQUEST_TIME_FLOAT"]."<br/>";
//a cadea de acceso pola cal foi accedido o script se existe
//concepto de query string un recurso do servidor que se fai mediante o metodo get de http
// se a url é http://hola.local/index.php?v=5
//a querystring é v=5 e os sucesivos valores pasados
echo $_SERVER["QUERY_STRING"]."<br/>";
//o raiz na que se executa o script segun a conf do server
//coidado porque se temos un virtual host colle o documentroot definido neste
echo $_SERVER["DOCUMENT_ROOT"]."<br/>";
//parte do header, o contido do accept de http se temos algun definido
echo $_SERVER["HTTP_ACCEPT"]."<br/>";
//parte do header, o xogo de carecteres usado na request utf-8 iso-latin etc
echo $_SERVER["HTTP_ACCEPT_CHARSET"]."<br/>";
//"	 " 	"  a codificacion usada na request gzip etc
echo $_SERVER["HTTP_ACCEPT_ENCODING"]."<br/>";
//"	 " 	"  a lingiaxe usada na request en es etc
echo $_SERVER["HTTP_ACCEPT_LANGUAGE"]."<br/>";
//contido de connection é parte do header de http exemple keep-alive
echo $_SERVER["HTTP_CONNECTION"]."<br/>";
//contido de host '	'	'	'	'	'	dom.local
echo $_SERVER["HTTP_HOST"]."<br/>";
//a paxina que referiu o user-agent desta paxina se hai algunha
echo $_SERVER["HTTP_REFERER"]."<br/>";
//se usa https a conexion amosa un valor non valeiro
echo $_SERVER["HTTPS"]."<br/>";
//a ip dende a que o usuario esta vendo a paxina que xerou o script
echo $_SERVER["REMOTE_ADDR"]."<br/>";
//o host dende o cal o usuario esta vendo a paxina que xerou o script
echo $_SERVER["REMOTE_HOST"]."<br/>";
//o porto mediante o cal o usuario se cominica dende o navegador para facer a request
echo $_SERVER["REMOTE_PORT"]."<br/>";
//o usuario autenficado
echo $_SERVER["REMOTE_USER"]."<br/>";
//o usuario autentificado se a request é redireccionada
echo $_SERVER["REDIRECT_REMOTE_USER"]."<br/>";
//a ruta absoluta do nome do script, en cli se é executado como ruta relativa
//aparece esa ruta especificada
echo $_SERVER["SCRIPT_FILENAME"]."<br/>";

//o especificado na directiva da configuaracion global ou no virtual host
echo $_SERVER["SERVER_ADMIN"]."<br/>";
//o porto polo cal o servidor esta respondendo as peticions con https pode variar
echo $_SERVER["SERVER_PORT"]."<br/>";
//cadea que conten a version do servidor e o nome do virtualhost se esta habilitado coas directivas podemos desactivar
echo $_SERVER["SERVER_SIGNATURE"]."<br/>";
//conten o mesmo que phpself
echo $_SERVER["SCRIPT_NAME"]."<br/>";
//a uri que se usou para acceder a esta paxina
echo $_SERVER["REQUEST_URI"]."<br/>";
//uri vs url
/*
*@link https://blog.udemy.com/url-vs-uri/
*@link http://stackoverflow.com/questions/176264/what-is-the-difference-between-a-uri-a-url-and-a-urn/1984225#1984225
*/
//unified resource ---
//		 |- location
//		 |-identifier
//		 |-name
//url é unha uri pero a url non ten porque ser unha url
//url localozacion
//urn nome spacio tempo non temos porque identificar o donde pola urn
//uri identifica o donde o o quen
//a uri pode ser unha url unha urn ou urn+url


//cando facemos unha autentificacion via http a variable é seteada a autorizacion
echo $_SERVER["PHP_AUTH_DIGEST"]."<br/>";
//o usuario proporcionado na autentificacion
echo $_SERVER["PHP_AUTH_USER"]."<br/>";
//o contrasinal
echo $_SERVER["PHP_AUTH_PW"]."<br/>";
//tipo de autentificacion
echo $_SERVER["AUTH_TYPE"]."<br/>";
//as ruta que se proporcina no cliente para acceder a un recurso sen o querystring
echo $_SERVER["PATH_INFO"]."<br/>";
//a version sin procesar do PATH_INFO
echo $_SERVER["ORIG_PATH_INFO"]."<br/>";

