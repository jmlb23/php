<?php
//interpreta os caracteres especiais
$heredoc = <<<HERE
esto é un\nheredoc
HERE;
//interpretaos como literais
$nowdoc = <<<'NOW'
esto é un now\ndoc
NOW;

echo $heredoc."<br/>";
echo $nowdoc."<br/>";


//devolve a cadea o reves
echo strrev($nowdoc);
//xenera un numero pseudoaleatorio entre dous numeros os parametros son opcionais
echo rand(0,10)."<br/>";
// o que vamos a reemplazar, o que usamos para reemplazar, a cadea na que reemplazamos, outro parametro opcional é o numero de ocurrencias a que hai que substituir
echo str_replace(array("e","é"),"",$heredoc )."<br/>";
//cadea na que reemplazamos, con que reemplazamos, donde empezamos,(opcional) ate donde reemplazamos se non se pon vai ate o final
echo substr_replace($nowdoc, " hola ",5)."<br/>";
//pasaselle un string e devolve a cadea coa primeira letra desta en maiuscula, uppercasefirst
echo ucfirst($nowdoc)."<br/>";
//recibe unha cadea e devolve unha cadea na que todas as palabras comezan con maiuscula uppercasewords
echo ucwords($heredoc)."<br/>";
//recibe unha cadea e devolvea en maiusculas
echo strtoupper($heredoc)."<br/>";
//recibe unha cadea e devolvea en maiusculas
echo strtolower($nowdoc)."<br/>";
//concatenase co punto
echo $nowdoc.$heredoc."<br/>";
//tamen coa coma pero é mala practica
echo $nowdoc,$heredoc;

