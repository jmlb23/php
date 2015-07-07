<?php
echo "<table>";
for($a=0;$a<10;$a++){
	echo "<tr >";	
	for($b=0;$b<10;$b++){
		echo "<td style='border:1px solid black'>";
		echo "$a $b <br/>";
		echo "</td>";
		break 3;//o break pode devolver un valor que sera o bucle do que sae
			//indicamos o nivel de profundidade do bucle anidado que
			//abandonar
			//e o continue funciona igual
	}
	echo "</tr>";
}
echo "</table>";
