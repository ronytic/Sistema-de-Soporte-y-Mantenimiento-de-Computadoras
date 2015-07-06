<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Informe";

	extract($_POST);
    
    include_once '../../class/usuarios.php';
	$uss=new usuarios;
	$usu10=todolista($uss->mostrarTodo("","paterno,materno,nombre"),"codusuarios","paterno,materno,nombre"," ");
    
    
    include_once '../../class/trabajo.php';
	$trabajo=new trabajo;
	$tra=$trabajo->mostrarTodo("nombre LIKE '%$nombre%'","nombre,orden");
    
    include_once '../../class/sistemasoperativos.php';
	$sistemasoperativos=new sistemasoperativos;
	$so=$sistemasoperativos->mostrarTodo("nombre LIKE '%$nombre%'","nombre,orden");
    
    include_once '../../class/programas.php';
	$programas=new programas;
	$pr=$programas->mostrarTodo("nombre LIKE '%$nombre%'","nombre,orden");
    
    include_once '../../class/impresora.php';
	$impresora=new impresora;
	$imp=todolista($impresora->mostrarTodo("nombre LIKE '%$nombre%'","nombre,orden"),"codimpresora","nombre"," ");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">
    $(document).on("ready",function(){
       $(document).on("change","#codusuarios",function(){
            var i=$(this).val()
            $.post("datos.php",{"codusuarios":i},function(data){
                $("#lugar").val(data.lugar)
                $("#unidad").val(data.unidad)
                $("#cargo").val(data.cargo)
            },"json");
       }); 
    });
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="x grid_11 ">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    
					<tr>
						<td><?php campos("Fecha","fecha","text",date("d/m/Y"),1,array("required"=>"required","readonly"=>"readonly","size"=>50));?></td>
                        <td><?php campos("Hora","hora","text",date("H:i:s"),1,array("required"=>"required","readonly"=>"readonly","size"=>50));?></td>
					</tr>
					
                    <tr>
						<td><?php campos("Solicitante","codusuarios","select",$usu10);?></td>
                        <td><?php campos("Lugar","lugar","text","",0,array("readonly"=>"readonly","size"=>50));?></td>
					</tr>
                    
                    <tr>
						<td><?php campos("Unidad","unidad","text","",0,array("readonly"=>"readonly","size"=>50));?></td>
                        <td><?php campos("Cargo","cargo","text","",0,array("readonly"=>"readonly","size"=>50));?></td>
					</tr>
                    <tr>
                        <td>
                            <strong>Trabajo de a Realizar</strong>
                        </td>
                        <td>
                            <strong>Sistema Operativo</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                            
                            
                        <?php
                            foreach($tra as $t){
                            ?>
                            <tr><td><label for="t<?php echo $t['codtrabajo']?>"><?php echo $t['nombre']?></label></td><td><input type="checkbox" name="t[<?php echo $t['codtrabajo']?>]" id="t<?php echo $t['codtrabajo']?>"></td></tr>
                            <?php    
                            }
                        ?>
                        </table>
                        </td>
                        <td>
                            <table>
                            
                            
                        <?php
                            foreach($so as $s){
                            ?>
                            <tr><td><label for="s<?php echo $s['codsistemasoperativos']?>"><?php echo $s['nombre']?></label></td><td><input type="checkbox" name="s[<?php echo $s['codsistemasoperativos']?>]" id="s<?php echo $s['codsistemasoperativos']?>"></td></tr>
                            <?php    
                            }
                        ?>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Programas</strong>
                        </td>
                        <td>
                            <strong>Impresora</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                            
                            
                        <?php
                            foreach($pr as $p){
                            ?>
                            <tr><td><label for="p<?php echo $p['codprogramas']?>"><?php echo $p['nombre']?></label></td><td><input type="checkbox" name="p[<?php echo $p['codprogramas']?>]" id="p<?php echo $p['codprogramas']?>"></td></tr>
                            <?php    
                            }
                        ?>
                        </table>
                        </td>
                        <td>
                            <?php campos("","codimpresora","select",$imp);?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Conexiones</strong>
                            <table>
                                <tr>
                                    <td><label>Si<input name="conexion" value="1"  type="radio"></label></td>
                                    <td><label>No<input name="conexion" value="0"  type="radio"></label></td>
                                </tr>
                            </table>

                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><?php campos("Usuario","usuario","text","",0,array());?></td>
                                    <td><?php campos("Contraseña","contrasena","text","",0,array());?></td>
                                </tr>
                            </table>
                        
                        </td>
                    </tr>
                    <tr>
						<td colspan="2"><?php campos("Observaciones","observaciones","textarea","",1,array("rows"=>4,"cols"=>105));?></td>
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