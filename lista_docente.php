<!DOCTYPE html>
<html>
<head>
	<title>Lista docente</title>
</head>
<body>


<h1>LISTA DE DOCENTES INSCRITOS</h1>
<?php 

	include_once("conectt.php");
	$cont=new DB();
	$pacientes=$cont->conectar();

	$strConsulta = "SELECT * from docente";
	$pacientes = mysqli_query($cont->conect, $strConsulta);
	$numfilas = mysqli_num_rows($pacientes);

	for ($i=0; $i<$numfilas; $i++)
	{
		$fila = mysqli_fetch_array($pacientes);
		$numlista = $i + 1;

		echo $fila['id'].' - '.$fila['dni'].' - '.$fila['nombres']." ".$fila['apellidos']." ";
		echo '<a href="certificado_pdf.php?id='.$fila['dni'].'" target="_blank">ver / imprimir</a>';
		echo "</br>";
	}
 ?>

</body>
</html>