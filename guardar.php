<?php
session_start();
if ($_SESSION['login']){
    require 'header.php';
} else { // si no se esta logeado
    echo "<script>window.location = 'login.php'</script>";
}
include ("tools.php");
datevalidsp();

$db=new MySQL();
extract($_POST);

$fecha = datetosql($fecha);
$fecha_examenes_lab = datetosql($fecha_examenes_lab);
/*
 * convertir fechas
 */


$sql = "INSERT INTO encuesta (
fecha,
area_trabajo,
edad,
nombre,
sexo,
num_afiliacion,
tabaquismo,
alcoholismo,
diabetes,
glucosa,
hta,
pa_sistolica,
pa_diastolica,
colesterol,
trigliceridos,
fecha_examenes_lab,
tipo_examenes_lab,
comida_rapida,
comida_rapida_num,
comida_cafeteria,
comida_cafeteria_num,
comida_casa,
comida_casa_num,
peso,
talla,
imc,
dx)
VALUES (
'$fecha',
'$_POST[area_trabajo]',
'$_POST[edad]',
'$_POST[nombre]',
'$_POST[sexo]',
'$_POST[num_afiliacion]',
'$_POST[tabaquismo]',
'$_POST[alcoholismo]',
'$_POST[diabetes]',
'$_POST[glucosa]',
'$_POST[hta]',
'$_POST[pa_sistolica]',
'$_POST[pa_diastolica]',
'$_POST[colesterol]',
'$_POST[trigliceridos]',
'$fecha_examenes_lab',
'$_POST[tipo_examenes_lab]',
'$_POST[comida_rapida]',
'$_POST[comida_rapida_num]',
'$_POST[comida_cafeteria]',
'$_POST[comida_cafeteria_num]',
'$_POST[comida_casa]',
'$_POST[comida_casa_num]',
'$_POST[peso]',
'$_POST[talla]',
'$_POST[imc]',
'$_POST[dx]')";

$db->consulta($sql);

?>
<form action="encuesta.php" method="post">
    <label>La encuesta se guard&oacute; con &eacute;xito <br> </label>
    <input type="submit" value="ingresar otra encuesta">
</form>
