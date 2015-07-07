<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/soportedetalle.php");
$soportedetalle=new soportedetalle;
include_once("../../class/soporte.php");
$soporte=new soporte;
extract($_POST);
//print_r($_POST);
//empieza la copia de archivos
/*
if(($_FILES['curriculum']['type']=="application/pdf" || $_FILES['curriculum']['type']=="application/msword" || $_FILES['curriculum']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && $_FILES['curriculum']['size']<="500000000"){
	@$curriculum=$_FILES['curriculum']['name'];
	@copy($_FILES['curriculum']['tmp_name'],"../curriculum/".$_FILES['curriculum']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido del curriculum. Verifique e intente nuevamente";
}
*/
/*if($_FILES['imagen']['name']!=""){
	@copy($_FILES['imagen']['tmp_name'],"../../imagenes/impresora/".$_FILES['imagen']['name']);	
}*/
$valores=array(	
                "codsoporte"=>"'$id'",
				"mensajes"=>"'$mensajes'",
                "estado"=>"'$estado'",
				
				);
				$soportedetalle->insertar($valores);
   $val1=array(	
               "estado"=>"'$estado'",
				);
                $soporte->actualizar($val1,$id);             
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


header("Location:revisar.php?id=".$id);
$titulo="Mensaje de Respuesta";
$folder="../../";
//include_once '../../mensajeresultado.php';
endif;?>