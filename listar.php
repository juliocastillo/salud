<?php
session_start();
if ($_SESSION['login']){
    require 'header.php';
} else { // si no se esta logeado
    echo "<script>window.location = 'login.php'</script>";
}
require 'model.php';
$model = new Model();
require 'tools.php';
datevalidsp();

    $consulta=$model->get_lista_reporte();
    ?>
    <div align="center">
                <table class="tabla2">
            <tr>
                <td class="" align="center" colspan="22">
                    <font class="FormHeaderFONT">Listado de registros</font>
                    <form action="report_exportar.php" method="post">
                             <input type="submit" value="Exportar tabla" /> 
                    </form>
                </td>
            </tr>
            <tr><td class="FormHeaderTD" style="border: 1px white solid; padding: 0px 1px 0px 1px"><font size="2"/>Corr</font></td>
                <td class="FormHeaderTD" style="border: 1px white solid; padding: 0px 1px 0px 1px"><font size="2"/>No. Afiliaci&oacute;n</font></td>
                <td class="FormHeaderTD" style="border: 1px white solid; padding: 0px 1px 0px 1px"><font size="2"/>Nombre</font></td>
                <td class="FormHeaderTD" style="border: 1px white solid; padding: 0px 1px 0px 1px"><font size="2"/>Edad</font></td>
                <td class="FormHeaderTD" style="border: 1px white solid; padding: 0px 1px 0px 1px"><font size="2"/>Diagn&oacute;stico</font></td>
                    <?php 
                    $nummx_corr=0;
                    $i=0;
                    while ($row = $db->fetch_array($consulta)){
                        $i++;
                        ?>
                        <tr>
                            <td style="background-color: white;border: 1px gainsboro solid; padding: 3px"><font class="ColumnFONT"><?php echo $i; ?></td>
                            <td style="background-color: white;border: 1px gainsboro solid; padding: 3px"><font class="ColumnFONT"><? echo $row['num_afiliacion']; ?></td>
                            <td style="background-color: white;border: 1px gainsboro solid; padding: 3px"><font class="ColumnFONT"><? echo $row['nombre']; ?></td>
                            <td style="background-color: white;border: 1px gainsboro solid; padding: 3px"><font class="ColumnFONT"><? echo $row['edad'].$err;?></td>
                            <td style="background-color: white;border: 1px gainsboro solid; padding: 3px"><font class="ColumnFONT"><? echo $row['dx']; ?></td>
                        </tr>
                <?php } ?>
                </table>
    </div>