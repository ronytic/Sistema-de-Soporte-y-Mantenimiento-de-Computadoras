<?php
include_once '../../class/usuarios.php';
$uss=new usuarios;
$usu10=$uss->mostrarTodo("codusuarios=".$_POST['codusuarios'],"paterno,materno,nombre");
$usu10=array_shift($usu10);
echo json_encode(array("lugar"=>"".$usu10['lugar']."",
                    "unidad"=>"".$usu10['unidad']."",
                    "cargo"=>"".$usu10['cargo'].""
));
?>