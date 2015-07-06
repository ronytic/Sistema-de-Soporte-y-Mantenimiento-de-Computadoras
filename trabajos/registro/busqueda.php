<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	
	extract($_POST);
    include_once '../../class/trabajo.php';
	$trabajo=new trabajo;
	$tra=$trabajo->mostrarTodo("nombre LIKE '%$nombre%'","nombre,orden");
	$titulo=array("nombre"=>"Nombre","descripcion"=>"Descripción","orden"=>"Orden");
	listadoTabla($titulo,$tra,1,"modificar.php","eliminar.php","");
}
?>