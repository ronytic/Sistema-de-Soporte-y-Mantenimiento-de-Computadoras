<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/informe.php");
$informe=new informe;

include_once("../../class/informetrabajo.php");
$informetrabajo=new informetrabajo;

include_once("../../class/informesistemasoperativos.php");
$informesistemasoperativos=new informesistemasoperativos;

include_once("../../class/informeprograma.php");
$informeprograma=new informeprograma;

extract($_POST);
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
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
$valores=array(	
                "codusuarios"=>"'$codusuarios'",
                "codimpresora"=>"'$codimpresora'",
				"conexionred"=>"'$conexion'",
                "usuariored"=>"'$usuario'",
                "contrasenared"=>"'$contrasena'",
                "observaciones"=>"'$observaciones'",
				);
				$informe->insertar($valores);
                $id=$informe->last_id();
                echo $id;
                
                
foreach($t as $tr=>$sv){
    
    $valores=array(	
        "codinforme"=>"'$id'",
        "codtrabajo"=>"'$tr'",
        );
        $informetrabajo->insertar($valores); 
 }
 foreach($s as $tr=>$sv){
    
    $valores=array(	
        "codinforme"=>"'$id'",
        "codsistemasoperativos"=>"'$tr'",
        );
        $informesistemasoperativos->insertar($valores); 
 }
 foreach($p as $tr=>$sv){
    
    $valores=array(	
        "codinforme"=>"'$id'",
        "codprogramas"=>"'$tr'",
        );
        $informeprograma->insertar($valores); 
 }
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>