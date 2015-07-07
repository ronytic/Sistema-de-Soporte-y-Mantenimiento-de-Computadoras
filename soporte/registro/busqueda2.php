<?php 
include_once '../../login/check.php';
$idusuario=$_SESSION['idusuario'];
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/soporte.php';
	extract($_POST);

	$soporte=new soporte;
	$pr=$soporte->mostrarTodo("codusuarios=$idusuario and estado LIKE '$estado' and mensajes LIKE '%$mensajes%'","fecha,hora");
	$titulo=array("mensajes"=>"Mensaje");
	listadoTabla($titulo,$pr,1,"","","",array("Revisar"=>"revisar.php"));
}
?>