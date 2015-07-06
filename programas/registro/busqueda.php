<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/programas.php';
	extract($_POST);

	$programas=new programas;
	$pr=$programas->mostrarTodo("nombre LIKE '%$nombre%'","nombre,orden");
	$titulo=array("nombre"=>"Nombre","descripcion"=>"Descripción","orden"=>"Orden");
	listadoTabla($titulo,$pr,1,"modificar.php","eliminar.php","");
}
?>