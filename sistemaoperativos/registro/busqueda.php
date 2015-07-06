<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/sistemasoperativos.php';
	extract($_POST);

	$sistemasoperativos=new sistemasoperativos;
	$so=$sistemasoperativos->mostrarTodo("nombre LIKE '%$nombre%'","nombre,orden");
	$titulo=array("nombre"=>"Nombre","descripcion"=>"Descripción","orden"=>"Orden");
	listadoTabla($titulo,$so,1,"modificar.php","eliminar.php","");
}
?>