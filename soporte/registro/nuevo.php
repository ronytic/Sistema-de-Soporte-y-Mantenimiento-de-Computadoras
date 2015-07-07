<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nueva Soporte Técnico";

include_once '../../class/usuarios.php';
	$uss=new usuarios;
	$usu10=todolista($uss->mostrarTodo("nivel=2","paterno,materno,nombre"),"codusuarios","paterno,materno,nombre"," ");
    
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_2 grid_8 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    
					<tr>
						<td colspan="2"><?php campos("Técnico","codusuarios","select",$usu10);?></td>
					</tr>
					<tr>
						<td colspan="2"><?php campos("Mensaje","mensajes","textarea","",1,array("rows"=>8,"cols"=>75));?></td>
					</tr>
                    <?php /*<tr>
						<td><?php campos("Imágen","imagen","file");?></td>
					</tr>*/?>
                    <tr>
						<td colspan="2"><?php campos("Usuario","usuario","text",$us['nombre']." ".$us['paterno']." ".$us['materno'],0,array("size"=>65,"readonly"=>"readnolny"));?></td>
                        
					</tr>
                    <tr>
                        <td><?php campos("Teléfono","telefono","text",$us['telefono'],0,array("size"=>20,"readonly"=>"readnolny"));?></td>
                        <td><?php campos("Unidad","unidad","text",$us['unidad'],0,array("size"=>20,"readonly"=>"readnolny"));?></td>
                    </tr>
					<tr><td><?php campos("Guardar","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>