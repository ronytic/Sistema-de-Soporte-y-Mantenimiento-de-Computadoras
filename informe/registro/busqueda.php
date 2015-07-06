<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/informe.php';
	include_once '../../class/usuarios.php';
	$usuarios=new usuarios;
	extract($_POST);
    $codusuarios=$codusuarios==""?'%':$codusuarios;
    $fecha=$fecha==""?'%':$fecha;

	$informe=new informe;
	$inf=$informe->mostrarTodo("codusuarios LIKE '$codusuarios' and fecha LIKE '$fecha'","");

	$titulo=array("solicitante"=>"Solicitante","fecha"=>"Fecha Informe","observaciones"=>"Observaciones");
    foreach($inf as $in){
    	$us1=array_shift($usuarios->mostrar($in['codusuarios']));

    	$datos[$i]['codinforme']=$in['codinforme'];
    	$datos[$i]['solicitante']=$us1['nombre']." ".$us1['paterno']." ".$us1['materno'];
    	$datos[$i]['fecha']=fecha2Str($in['fecha'],0);
    	$datos[$i]['observaciones']=$in['observaciones'];
    }
	listadoTabla($titulo,$datos,1,"","eliminar.php","ver.php");
}
?>