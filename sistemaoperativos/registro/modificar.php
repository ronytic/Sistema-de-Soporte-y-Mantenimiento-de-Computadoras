<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Sistema Operativo";
$id=$_GET['id'];
include_once '../../class/sistemasoperativos.php';
$sistemasoperativos=new sistemasoperativos;
$so=array_shift($sistemasoperativos->mostrar($id));
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre","nombre","text",$so['nombre'],1,array("required"=>"required"));?></td>
					</tr>
					<tr>
						<td><?php campos("Descripción","descripcion","text",$so['descripcion']);?></td>
					</tr>
                    <?php /*<tr>
						<td><?php campos("Imágen","imagen","file");?>
                        <br>
                        <?php
							if($so['imagen']!=""){
							?><a href="../../imagenes/sistemasoperativos/<?php echo $so['imagen']?>" target="_blank"><img src="../../imagenes/sistemasoperativos/<?php echo $so['imagen']?>" width="150"></a><?php	
							}
						?>
                        </td>
					</tr>
                    <tr>
						<td><?php campos("Orden","orden","text",$so['orden']);?></td>
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