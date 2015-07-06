<?php
include_once("../../impresion/pdf.php");
$titulo="Informe Técnico";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/informe.php");
$informe=new informe;
$inf=array_shift($informe->mostrar($id));

include_once("../../class/usuarios.php");
$usu1=new usuarios;
$usus1=array_shift($usu1->mostrar($inf['codusuarios']));
$usus2=array_shift($usu1->mostrar($inf['id']));

include_once("../../class/trabajo.php");
$trabajo=new trabajo;
include_once("../../class/informetrabajo.php");
$informetrabajo=new informetrabajo;
$pdf=new PDF("P","mm","letter");
include_once("../../class/programas.php");
$programas=new programas;
include_once("../../class/informeprograma.php");
$informeprograma=new informeprograma;

include_once("../../class/impresora.php");
$impresora=new impresora;
$imp=array_shift($impresora->mostrar($inf['codimpresora']));

$pdf=new PDF("P","mm","letter");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->CuadroCuerpoPersonalizado(20," Fecha:",1,1,1,"B");
$pdf->CuadroCuerpo(40,date("d/m/Y",strtotime($inf['fecha'])),1,"C",1);
$pdf->CuadroCuerpoPersonalizado(20," Hora:",1,1,1,"B");
$pdf->CuadroCuerpo(40,date("H:i:s",strtotime($inf['hora'])),1,"C",1);
$pdf->CuadroCuerpoPersonalizado(20," Página:",1,1,1,"B");
$pdf->CuadroCuerpo(40,$pdf->PageNo()." de {nb}",1,"C",1);
$pdf->ln(10);
$pdf->CuadroCuerpoPersonalizado(25," Solicitante:",1,1,1,"B");
$pdf->CuadroCuerpo(60,$usus1['nombre']." ".$usus1['paterno']." ".$usus1['materno'],1,"C",1);
$pdf->CuadroCuerpoPersonalizado(20," Cargo:",1,1,1,"B");
$pdf->CuadroCuerpo(40,$usus1['cargo'],1,"C",1);
$pdf->ln();
$pdf->CuadroCuerpoPersonalizado(25," Lugar:",1,1,1,"B");
$pdf->CuadroCuerpo(60,$usus1['lugar'],1,"C",1);
$pdf->CuadroCuerpoPersonalizado(20," Unidad:",1,1,1,"B");
$pdf->CuadroCuerpo(40,$usus1['unidad'],1,"C",1);
$pdf->ln(10);


$pdf->CuadroCuerpoPersonalizado(60," Trabajos a Realizar",0,1,0,"B");
$pdf->Ln(7);
$i=0;
foreach($trabajo->mostrarTodos("","nombre") as $t){$i++;
    //$pdf->CuadroCuerpoPersonalizado(20," ".$t['nombre'],0,1,0,"B");
    $pdf->CuadroCuerpoPersonalizado(80," ".$t['nombre'],0,1,1,"");
    $it=$informetrabajo->mostrarTodos("codinforme=$id and codtrabajo=".$t['codtrabajo']);
    $it=count($it)?'X':'';
    $pdf->CuadroCuerpo(10,$it,0,"C",1);
    if($i%2==0){
    $pdf->Ln();
    }
}
$pdf->ln(10);
$pdf->CuadroCuerpoPersonalizado(60," Software a Instalar",0,1,0,"B");
$pdf->Ln(7);
$i=0;
foreach($programas->mostrarTodos("","nombre") as $t){$i++;
    //$pdf->CuadroCuerpoPersonalizado(20," ".$t['nombre'],0,1,0,"B");
    $pdf->CuadroCuerpoPersonalizado(80," ".$t['nombre'],0,1,1,"");
    $it=$informeprograma->mostrarTodos("codinforme=$id and codprogramas=".$t['codprogramas']);
    $it=count($it)?'X':'';
    $pdf->CuadroCuerpo(10,$it,0,"C",1);
    if($i%2==0){
    $pdf->Ln();
    }
}

$pdf->ln(10);
$pdf->CuadroCuerpoPersonalizado(60," Impresora",0,1,0,"B");
$pdf->Ln(7);
$pdf->CuadroCuerpoPersonalizado(80," ".$imp['nombre'],0,1,1,"");
 
$pdf->ln(10);
$pdf->CuadroCuerpoPersonalizado(60," Conexiones",0,1,0,"B");
$pdf->Ln(7);
$pdf->CuadroCuerpoPersonalizado(40," Red:",0,1,1,"B");
$pdf->CuadroCuerpoPersonalizado(10," Si:",0,1,1,"B");
$pdf->CuadroCuerpoPersonalizado(10," ".$imp['conexionred']?'X':'',0,"C",1,"");
$pdf->CuadroCuerpoPersonalizado(10," No:",0,1,1,"B");
$pdf->CuadroCuerpoPersonalizado(10," ".!$imp['conexionred']?'X':'',0,"C",1,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(30," Usuario:",0,1,1,"B");
$pdf->CuadroCuerpoPersonalizado(40," ".$inf['usuariored'],0,"C",1,"");
$pdf->CuadroCuerpoPersonalizado(30," Contraseña:",0,1,1,"B");
$pdf->CuadroCuerpoPersonalizado(40," ".$inf['contrasenared'],0,"C",1,"");

$pdf->ln(10);
$pdf->CuadroCuerpoPersonalizado(60," Observaciones",0,1,0,"B");
$pdf->Ln(7);
$pdf->CuadroCuerpoMulti(180," ".$inf['observaciones'],0,"L",0,"");

$pdf->ln(20);
$pdf->CuadroCuerpo(20,"",0,"C","");
$pdf->CuadroCuerpo(60,$usus1['nombre']." ".$usus1['paterno']." ".$usus1['materno'],0,"C","T");
$pdf->CuadroCuerpo(30,"",0,"C","");
$pdf->CuadroCuerpo(60,$usus2['nombre']." ".$usus2['paterno']." ".$usus2['materno'],0,"C","T");
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>