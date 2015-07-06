<?php
include_once("../../login/check.php");
$titulo="Listado de Informes";
$folder="../../";

include_once '../../class/usuarios.php';
	$uss=new usuarios;
	$usu10=todolista($uss->mostrarTodo("","paterno,materno,nombre"),"codusuarios","paterno,materno,nombre"," ");
    
include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td width="250"><?php campos("Solicitante","codusuarios","select",$usu10);?></td>
                        
                        <td><?php campos("Fecha","fecha","date","",0);?></td>
                        
                       
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
