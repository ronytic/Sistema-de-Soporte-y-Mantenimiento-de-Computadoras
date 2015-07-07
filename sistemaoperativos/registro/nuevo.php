<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Sistema Operativo";
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    
					<tr>
						<td><?php campos("Nombre","nombre","text","",1,array("required"=>"required","size"=>50));?></td>
					</tr>
					<tr>
						<td><?php campos("Descripción","descripcion","textarea","",1,array("rows"=>4,"cols"=>55));?></td>
					</tr>
                     <?php /*<tr>
						<td><?php campos("Imágen","imagen","file");?></td>
					</tr>
                    <tr>
						<td><?php campos("Orden","orden","text");?></td>
					</tr>*/?>
					<tr><td><?php campos("Guardar","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>