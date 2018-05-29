<?php
	$p1 = $_GET["parametro1"];
	for ($i=0; $i < 10; $i++) { 
		#echo "string"; hace doble procesamiento imprime en pantalla y en consola
		#print solo imprime en pantalla
		print(($i+1)." Hola PHP"."<br>");
	}
?>


<html>
<head>
	<title></title>
</head>
<body>
	<?php print($p1); ?>
</body>
</html>