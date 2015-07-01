<?php
//os argumentos pasados por liña de comandos como en c e c++
//	argc para a cantidade de argumentos pasados o script
//	argv un array cos argumentos no que o primeiro é o nome do script como en bash
echo "$argc"."\n";//usamos \n xa que este script é de cli
foreach($argv as $s) echo $s."\n";

