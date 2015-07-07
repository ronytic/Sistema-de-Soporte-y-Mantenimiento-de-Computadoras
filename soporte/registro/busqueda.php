<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/soporte.php';
	extract($_POST);

	$soporte=new soporte;
	$pr=$soporte->mostrarTodo("estado LIKE '$estado' and mensajes LIKE '%$mensajes%'","fecha,hora");
	$titulo=array("mensajes"=>"Mensaje");
	listadoTabla($titulo,$pr,1,"","eliminar.php","",array("Revisar"=>"revisar.php"));
}
?>