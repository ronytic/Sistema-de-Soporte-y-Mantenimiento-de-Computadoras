<?php
include_once("../login/check.php");
if(!empty($_POST)):
$narchivo="usuarios";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
if($_FILES['foto']['name']!=""){
	@copy($_FILES['foto']['tmp_name'],"../../imagenes/usuarios/".$_FILES['foto']['name']);	
}
$valores=array("usuario"=>"'$usuario'",
			"password"=>"MD5('$password')",
			"nombre"=>"'$nombres'",
			"paterno"=>"'$paterno'",
			"materno"=>"'$materno'",
			"nivel"=>"'$nivel'",
			"ci"=>"'$ci'",
			"lugar"=>"'$lugar'",
            "unidad"=>"'$unidad'",
			"telefono"=>"'$telefono'",
			"email"=>"'$email'",
			"celular"=>"'$celular'",
			"cargo"=>"'$cargo'",
			"foto"=>"'".$_FILES['foto']['name']."'",
			"obs"=>"'$observacion'"
			);
${$narchivo}->insertar($valores);
$codinsercion=${$narchivo}->last_id();
$mensaje[]="EL USUARIO SE GUARDO CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../";
include_once '../mensajeresultado.php';
endif;?>