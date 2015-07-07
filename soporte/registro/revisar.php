<?php
include_once '../../login/check.php';
//print_r($_SESSION);
$folder="../../";
$titulo="Respuesta";

$id=$_GET['id'];

    include_once '../../class/soporte.php';
	$soporte=new soporte;
    $sop=array_shift($soporte->mostrar($id));
    include_once '../../class/usuarios.php';
	$uss=new usuarios;
    
    include_once '../../class/soportedetalle.php';
	$soportedetalle=new soportedetalle;
	//$usu10=todolista($uss->mostrarTodo("nivel=2","paterno,materno,nombre"),"codusuarios","paterno,materno,nombre"," ");
    $us1=array_shift($uss->mostrar($sop['codusuarios']));
    $us2=array_shift($uss->mostrar($sop['id']));
    $estado=array("0"=>"Pendiente","1"=>"Concluido");
//print_r($sop);
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
        <div class="prefix_0 grid_11 alpha">
            <fieldset>
                <div class="titulo">Solicitud de Soporte Técnico</div>
                <table class="tablareg tablasec">
                    <tr>
                        <td class="resaltar">Técnico</td><td><?php echo $us1['nombre']." ".$us1['paterno']." ".$us1['materno']?></td>
                        <td class="resaltar">Cargo</td><td><?php echo $us1['cargo']?></td>
                        <td class="resaltar">Unidad</td><td><?php echo $us1['unidad']?></td>
                        <td class="resaltar">Teléfono</td><td><?php echo $us1['telefono']?> <?php echo $us1['celular']?></td>
                    </tr>
                    <tr><td class="resaltar">Mensaje</td><td colspan="7"><?php echo $sop['mensajes']?></td></tr>
                    <tr>
                        <td class="resaltar">Usuario Solicitante</td><td><?php echo $us2['nombre']." ".$us2['paterno']." ".$us2['materno']?></td>
                        <td class="resaltar">Cargo</td><td><?php echo $us2['cargo']?></td>
                        <td class="resaltar">Unidad</td><td><?php echo $us2['unidad']?></td>
                        <td class="resaltar">Teléfono</td><td><?php echo $us2['telefono']?>-<?php echo $us2['celular']?></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <?php
        foreach($soportedetalle->mostrarTodo("codsoporte=".$id,"fecha,hora") as $sd){
            $us3=array_shift($uss->mostrar($sd['id']));
            if($sd['id']==$sop['codusuarios']){
                $prefix=1;
            }else{
                $prefix=0;
            }
            
            ?>
            <div class="prefix_<?php echo $prefix?> grid_10 alpha">
            <fieldset>
                <div class="titulo"><?php echo $us3['nombre']." ".$us3['paterno']." ".$us3['materno']?> - <?php echo $us3['cargo']?></div>
                <table class="tablareg tablasec">
                    <tr><td class="resaltar"><small>Fecha</small></td><td><small><?php echo date("d/m/Y",strtotime($sd['fecha']))?></small></td><td class="resaltar"><small>Hora</small></td><td><small><?php echo $sd['hora']?></small></td></tr>
                    <tr><td class="resaltar">Mensaje</td><td colspan="7"><?php echo $sd['mensajes']?></td></tr>
                    
                </table>
            </fieldset>
        </div>
            <?php
        }
        ?>
    
    
    
    	<div class="prefix_0 grid_11 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                
                <?php if($sop['estado']=="0"):?>
                
                <form action="guardardetalle.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
                    
					
					<tr>
						<td colspan="1" rowspan="3"><?php campos("Mensaje","mensajes","textarea","",1,array("rows"=>8,"cols"=>75));?>
                        <br>
                        <?php campos("Estado de la Solititud","estado","select",$estado,1,array("size"=>50));?>
                        </td>
                        <td colspan="2"><?php campos("Usuario","usuario","text",$us['nombre']." ".$us['paterno']." ".$us['materno'],0,array("size"=>25,"readonly"=>"readnolny"));?></td>
                        </tr>
                    <tr>
                        <td><?php campos("Teléfono","telefono","text",$us['telefono'],0,array("size"=>20,"readonly"=>"readnolny"));?></td>
                        </tr>
                    <tr>
                        <td><?php campos("Unidad","unidad","text",$us['unidad'],0,array("size"=>20,"readonly"=>"readnolny"));?></td>
					</tr>
                    <?php /*<tr>
						<td><?php campos("Imágen","imagen","file");?></td>
					</tr>*/?>

					<tr><td colspan="2"><?php campos("Responder","guardar","submit");?></td></tr>
				</table>
                </form>
                <?php else:
                    echo "<h2><center>Asistencia de Soporte Técnico Concluido</center></h2>";
                endif;?>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>