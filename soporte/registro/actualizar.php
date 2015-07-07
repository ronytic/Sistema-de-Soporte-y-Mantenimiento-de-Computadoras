<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/impresora.php");
$impresora=new impresora;
extract($_POST);
//empieza la copia de archivos
$valores=array(	
                "nombre"=>"'$nombre'",
				"descripcion"=>"'$descripcion'",
                
                "orden"=>"'$orden'",
				);
                
if($_FILES['imagen']['name']!=""){
	@copy($_FILES['imagen']['tmp_name'],"../../imagenes/impresora/".$_FILES['imagen']['name']);	
	$valores["imagen"]="'".$_FILES['imagen']['name']."'";
}
				$impresora->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>