<?php
include_once("../../login/check.php");
$titulo="Listado de Solictudes de Soporte Técnico";
$folder="../../";

$estado=array("0"=>"Pendiente","1"=>"Concluido");
include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_9 prefix_1 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda2.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Estado de la Solititud","estado","select",$estado,1,array("size"=>50));?></td>
                        <td><?php campos("Mensaje de la Solicitud","mensajes","text","",1,array("size"=>50));?></td>
                        
                       
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>
