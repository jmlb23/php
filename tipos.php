<?php
//tipos ecalares
$integer= 5;
$float = 5.2;
$boolean = true;
$string = "esto é unha string en comiñas dobres";
//composto
$array = [4,5,6];
$array = array(4,5,6);
//creacion dun obxeto xenerico cunha StdClass
$obxeto = new StdClass();
//creacion dun atributo de maneira dinamica en php
$obxeto->hola=5;
foreach($obxeto as $key => $value){
	//curiosa a flexiblidade que proporciona php no tocante a obxetos
	echo "atributo $key e valor $value";
}
