<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/impresora.php';
	extract($_POST);

	$impresora=new impresora;
	$pr=$impresora->mostrarTodo("nombre LIKE '%$nombre%'","nombre,orden");
	$titulo=array("nombre"=>"Nombre","descripcion"=>"Descripción","orden"=>"Orden");
	listadoTabla($titulo,$pr,1,"modificar.php","eliminar.php","");
}
?>