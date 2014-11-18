<?php
/*
* Library Functions for sistems health
* j.castillo
*/
//convierte la fecha de sql a fecha en españo usando /
function datetosp($date){
    if ($date!='0000-00-00'){
        return date("d/m/Y",strtotime($date));
    }
};

//convertie fecha en españo usando / a fecha sql
function datetosql($date){
    if ($date!='0000-00-00'){    
        list($d,$m,$a)=explode("/",$date);
        return $a."-".$m."-".$d;
    }
};

function solonumero($numero){
    if (ereg('^[0-9]+$', $numero)) {
        return true; // numero valido
    }
    else{
        return false; // numero no valido
    }
}

function validarFecha($fecha){
    $sep = "[/]";
    $reg = ereg("(0[1-9]|[12][0-9]|3[01])$sep(0[1-9]|1[012])$sep(19|20)[0-9]{2}",$fecha);
        return $reg; // fecha valida
}


function solotexto($string){
    if (ereg('^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$', $string)) {
        return true; // es cadena validad
    }
    else{
        return false; // es cadena no valida
    }
}





// esta funcion se ejecutara al principio de todo PHP que vaya a usar formato de fecha
function datevalidsp(){
    ?>
    <script type="text/javascript" language="javascript">
    var sendReq;
    var accion=0;
    var patron = new Array(2,2,4)
    var patron2 = new Array(1,3,3,3,3)
    
    function mascara(d,sep,pat,nums){
    if(d.valant != d.value)
    {
            val = d.value
            largo = val.length
            val = val.split(sep)
            val2 = ''
            for(r=0;r<val.length;r++){
                            val2 += val[r]
            }
            if(nums){
                for(z=0;z<val2.length;z++){
                    if(isNaN(val2.charAt(z))){
                        letra = new RegExp(val2.charAt(z),"g")
                        val2 = val2.replace(letra,"")
                    }
                }
            }
            val = ''
            val3 = new Array()
            for(s=0; s<pat.length; s++)
            {
                val3[s] = val2.substring(0,pat[s])
                val2 = val2.substr(pat[s])
            }
            for(q=0;q<val3.length; q++)
            {
            if(q ==0){
                            val = val3[q]
            }
            else{
                if(val3[q] != ""){
                val += sep + val3[q]
                }
            }
            }
            d.value = val
            d.valant = val
            }
        }


    //------------------------------------------------------verificar el formato de la fecha-------------------------------------------------------
    function formatofecha(id, fecha){
        /*var formatofecha = new RegExp("[0-9][0-9]\-[0-9][0-9]\-[0-9][0-9][0-9][0-9]");*/
        var regex = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;

        if(fecha!="")
        {

            if(!regex.test(fecha))
            {
                alert("Ingrese una fecha con formato dd/mm/aaaa");
                document.getElementById(id).value="";
                return false;
            }
            /*var regex = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
            if(!regex.test(fecha)){
                alert("Ingrese una fecha con formato dd/mm/aaaa");
                $('fechanacimiento').value='';
                $('edad').innerHTML='';
                return;
            }*/
            /*var d = fecha.replace(regex, '$2/$1/$3');
            alert(d);*/

            var d = new Date(fecha.replace(regex, '$2/$1/$3'));
            /*alert(d);*/
            if(!((parseInt(RegExp.$2, 10) == (1+d.getMonth()) ) && (parseInt(RegExp.$1, 10) == d.getDate()) && (parseInt(RegExp.$3, 10) == d.getFullYear()))){
                alert('La fecha '+fecha+' no existe. Por favor digite una fecha válida.');
                document.getElementById(id).value="";
                return;
            }
        }
    }


    function date_system_valid(id){
        var fecha_actual = new Date()

        var dia = fecha_actual.getDate()
        var mes = fecha_actual.getMonth() + 1
        var anio = fecha_actual.getFullYear()

        if (mes < 10)
            mes = '0' + mes

        if (dia < 10)
            dia = '0' + dia

        var hoy=dia + "/" + mes + "/" + anio;

        inputdate = document.getElementById(id)
        if (inputdate.value == 't' || inputdate.value == 'T'){
            inputdate.value = hoy
            return true
        }


        //alert(hoy);
        if(document.getElementById(id).value != "")
        {
            var vari=document.getElementById(id).value;
            var naci = vari.split('/');
            var fechan=naci[0]+"/"+naci[1]+"/"+naci[2];
            //alert (fechan);

        f1=hoy.split('/');
        f2=fechan.split('/');
//        date1=new Date(f1[2],f1[1]/1,f1[0]);
//        date2=new Date(f2[2],f2[1]/1,f2[0]);

            //var date1  = new Date(hoy);
            //var date2  = new Date(fn);
        date1=f1[2]+f1[1]+f1[0];
        date2=f2[2]+f2[1]+f2[0];    

            //
            if (date1 >= date2)
            {
                return true;

            }
            else
            {
                alert ("La fecha no debe ser mayor que la fecha de hoy");
                document.getElementById(id).value="";
                document.getElementById(id).focus();
                return false;
                //document.getElementById('cal-button-2').focus();
                //document.getElementById('cal-button-2').click();
            }
        }
    }

    function date_greater_than_or_equal_to(id,date_greater, date_less, message){
        /*
            * capturando fecha mayor
            */

        f1=date_greater.split('/');
        date1=f1[2]+f1[1]+f1[0];
        
        //date1=new Date(f1[2],f1[1]/1,f1[0]);

        /*
        * capturando fecha menor
        */

       
        f2=date_less.split('/');
        date2=f2[2]+f2[1]+f2[0];  
        //date2=new Date(f2[2],f2[1]/1,f2[0]);
        /*
        * comparando fechas
        */
        if (date1 >= date2){
            return true;
        } else {
            if (f1=="" || f2 == ""){
                return false
            } else {
                alert (message);
                document.getElementById(id).value="";
                document.getElementById(id).focus();
                return false;
            }
        }
    }

        function upper(obj){
            obj.value = obj.value.toUpperCase()
        }
        function nomayor125(obj){
            if (isNaN(obj.value)){
                alert("La edad debe ser un número");
                obj.value="";
            }
            var edad = parseInt(obj.value)
            if (edad > 125 || edad<1){
                alert("Edad aceptada 1-125 años")
                obj.value=""
            }
        }
        
        function evaluaedad(){
            edadp = document.getElementById('edadp').value;
            edad = document.getElementById('edad')
            if (edadp==2 && edad.value>11){
                edad.value = '';
            }
            if (edadp==3 && edad.value>30){
                edad.value = '';
            }
        }

    </script>   
    <?php
}