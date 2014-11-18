<?php
session_start();
if ($_SESSION['login']){
    require 'header.php';
} else { // si no se esta logeado
    echo "<script>window.location = 'login.php'</script>";
}
require 'llenarlistas.php';
require 'tools.php';
datevalidsp();
?>
<html>
    <head>
        <title></title>
        <meta charset="ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	        <script type="text/javascript" src="./js/functions_and_ajax.js"></script>

	<script language="Javascript">
		function calc_imc(){
			var peso = document.getElementById("peso").value;
			var talla = document.getElementById("talla").value;
		if (peso=="" || talla==""){
			return;
		}
			var imc = parseFloat(peso/(talla ^ 2)).toFixed(1);
			document.getElementById("imc").value = imc;
			if (imc<25){
				document.getElementById("dx").value = 1
			}
			if (imc>=25 && imc<30){
				document.getElementById("dx").value = 2
			}
			if (imc>=30 && imc<35){
				document.getElementById("dx").value = 3
			}
			if (imc>=35 && imc<40){
				document.getElementById("dx").value = 4
			}
			if (imc>=40){
				document.getElementById("dx").value = 5
			}

		}
	</script>
    </head>
    <body>
        <form name="encuesta" action="guardar.php" method="post">
	<div id='encuesta_errorloc' class='error_strings' style="background-color:orange; border-radius: 4px; border: 0px ; width:900px;"></div>   

            <table border="1" class="tabla1">
                <tr><td class="tdLabel">Fecha</td><td><input type="text" name="fecha" id="fecha" value="" size="8" onblur="formatofecha(this.id, this.value); date_system_valid(this.id)" onkeyup="mascara(this,'/',patron,true)"> dd/mm/aaaa
                    </td><td class="tdLabel">Area de trabajo</td><td>
                        <select name="area_trabajo" id="area_trabajo"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmlarea_trabajo();
                            print $cbo->llenarlista($area_trabajo);
                        ?>
                        </select></td>
                    <td class="tdLabel">Edad</td><td><input type="text" name="edad" id="edad" value="" size="8" > a&ntilde;os</td>
                </tr>
                <tr><td class="tdLabel">Nombre</td><td><input type="text" name="nombre" id="nombre" value="" size="20"></td>
                    <td class="tdLabel">Sexo</td><td>
                        <select name="sexo" id="sexo"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmlsexo();
                            print $cbo->llenarlista($sexo);
                        ?>

                        </select></td>
                    <td class="tdLabel">No. Afiliaci&oacute;n</td><td><input type="text" name="num_afiliacion" id="num_afiliacion" value="" size="8"></td>
                </tr>
                <tr><td colspan="12" class="tdData">ANTECEDENTS Y DATOS CLINICOS</td></tr>
                <tr><td class="tdLabel">Tabaquismo</td><td>
                        <select name="tabaquismo" id="tabaquismo"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmlresp();
                            print $cbo->llenarlista($tabaquismo);
                        ?>
                        </select></td>
                    <td class="tdLabel">Alcoholismo</td><td>
                        <select name="alcoholismo" id="alcoholismo"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmlresp();
                            print $cbo->llenarlista($alcoholismo);
                        ?>
                        </select></td>
                    <td class="tdLabel">Diabetes</td><td>
                        <select name="diabetes" id="diabetes"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmlresp();
                            print $cbo->llenarlista($diabetes);
                        ?>

                        </select></td>
                    <td class="tdLabel">Glucosa</td><td><input type="text" name="glucosa" id="glucosa" value="" size="8"></td>
                </tr>
                <tr><td class="tdLabel">HTA</td><td>
                        <select name="hta" id="hta"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmlresp();
                            print $cbo->llenarlista($hta);
                        ?>

                        </select></td>
                        <td class="tdLabel">PA diast&oacute;lica/sistólica</td><td><input type="text" name="pa_sistolica" id="pa_sistolica" value="" size="3" maxlength="3">/<input type="text" name="pa_diastolica" id="pa_diastolica" value="" size="3" maxlength="3"></td>
                    <td>Dislipidemias: Colesterol</td><td><input type="text" name="colesterol" id="colesterol" value="" size="8">mg/dl</td>
                    <td class="tdLabel">Trigliceridos</td><td><input type="text" name="trigliceridos" id="trigliceridos" value="" size="8"></td>
                </tr>
                <tr><td colspan="12" class="tdLabel">Cuando se tom&oacute; por &uacute;ltima vez los ex&aacute;menes de laboratorio? <input type="text" name="fecha_examenes_lab" id="fecha_examenes_lab" value="" size="8" onblur="formatofecha(this.id, this.value); date_system_valid(this.id)" onkeyup="mascara(this,'/',patron,true)" > y cu&aacute;les fueron?</td>
                </tr>
                <tr>
                    <td colspan="12"><textarea name="tipo_examenes_lab" id="tipo_examenes_lab" cols="75" ></textarea></td>
                </tr>
                <tr><td colspan="12" class="tdData">ANTECEDENTES DIETETICOS</td></tr>
                <tr><td class="tdLabel">Consumo de comidas r&aacute;pidas</td><td>
                        <select name="comida_rapida" id="comida_rapida"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmlresp();
                            print $cbo->llenarlista($comida_rapida);
                        ?>

                        </select></td>
                    <td class="tdLabel">Cuantas veces por semana?</td><td><input type="text" name="comida_rapida_num" id="comida_rapida_num" value="" size="8" ></td>
                </tr>
                <tr><td class="tdLabel">Consume alimentos preparados en la cafeter&iacute;a?</td><td>
                        <select name="comida_cafeteria" id="comida_cafeteria"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmlresp();
                            print $cbo->llenarlista($comida_cafeteria);
                        ?>

                        </select></td>
                    <td class="tdLabel">Cuantas veces por semana?</td><td><input type="text" name="comida_cafeteria_num" id="comida_cafeteria_num" value="" size="8" ></td>
                </tr>
                <tr><td class="tdLabel">Consume alimentos preparados en casa?</td><td>
                        <select name="comida_casa" id="comida_casa"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmlresp();
                            print $cbo->llenarlista($comida_casa);
                        ?>

                        </select></td>
                    <td class="tdLabel">Cuantas veces por semana?</td><td><input type="text" name="comida_casa_num" id="comida_casa_num" value="" size="8" ></td>
                </tr>
                <tr><td colspan="10" class="tdData">ANTECEDENTES ANTROPOMETRICOS</td></tr>
                <tr><td class="tdLabel">PESO Kg.</td><td><input type="text" name="peso" id="peso" value="" size="8" onblur="calc_imc()"></td>
                    <td class="tdLabel">TALLA Mts.</td><td><input type="text" name="talla" id="talla" value="" size="8" onblur="calc_imc()"></td>
                    <td class="tdLabel">IMC peso / (talla ^ 2)</td><td><input type="text" name="imc" id="imc" value="" size="8"></td>
                    <td class="tdLabel">Dx</td><td>
                        <select name="dx" id="dx"><option value="000">...Seleccione...</option>
                        <?php
                            $cbo = new Htmldx();
                            print $cbo->llenarlista($dx);
                        ?>

                        </select></td>
                </tr>
                <tr>
                    <td colspan="12" align="center"><input type="submit" value="Guardar encuesta"></td>
                </tr>
            </table>
            
        </form>
    </body>
	<script language="Javascript">

		var frmvalidator  = new Validator("encuesta");
		frmvalidator.EnableOnPageErrorDisplaySingleBox();
		frmvalidator.EnableMsgsTogether();
    
		frmvalidator.addValidation("fecha","required","Ingrese fecha de encuesta");
		frmvalidator.addValidation("area_trabajo","dontselect=000","Seleccione area de trabajo");
	</script>

</html>