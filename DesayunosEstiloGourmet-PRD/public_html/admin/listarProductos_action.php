<?php
$mysqli= new mysqli("localhost","root","","dev_desayunosgourmet");

if($mysqli ->connect_errno)
{
	echo "Fallo al conectar".$mysqli->connect_errno;

}
else
{
	$mysqli->set_charset("utf8");

	$jsondata = array();
	$jsondataList = array();

	if($_GET['param1']=="cuantos")
	{

		$myquery = "SELECT COUNT(*) total FROM producto";

		$resultado = $mysqli->query($myquery);

		$fila = $resultado ->fetch_assoc();

		$jsondata['total'] = $fila['total'];
	}
	elseif($_GET["param1"]=="dame")
	{
		$myquery = "SELECT p.id AS idP, c.id AS idC, p.imagen AS imagen, p.nombre AS nombreP, c.nombre AS nombreC, p.precio AS precio, p.stock AS stock, p.detalle AS detalle, p.fecha_creacion AS fecha FROM producto AS p INNER JOIN categorias AS c ON p.categoria = c.id LIMIT ".$mysqli->real_escape_string($_GET['limit'])." OFFSET ".$mysqli->real_escape_string($_GET["offset"]);

		$resultado = $mysqli->query($myquery);
		while($fila = $resultado ->fetch_assoc())
		{
			$jsondataperson = array();
			$jsondataperson["idP"] = $fila["idP"];
			$jsondataperson["idC"] = $fila["idC"];
			$jsondataperson["imagen"] = $fila["imagen"];
            $jsondataperson["nombreP"] = utf8_decode($fila["nombreP"]);
            $jsondataperson["nombreC"] = $fila["nombreC"];
            $jsondataperson["precio"] = $fila["precio"];
            $jsondataperson["stock"] = $fila["stock"];
            $jsondataperson["detalle"] = $fila["detalle"];
            $jsondataperson["fecha"] = $fila["fecha"];

			$jsondataList[]=$jsondataperson;

		}

		$jsondata["lista"] = array_values($jsondataList);
	}

header("Content-type:application/json; charset = utf-8");
echo json_encode($jsondata);
exit();
}
?>