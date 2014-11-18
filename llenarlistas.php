<?php
class Htmlarea_trabajo{
    function llenarlista($sel){
        $db = new MySQL();
        $sqlcommand = "SELECT id, area_trabajo as nombre
                        FROM ctl_area_trabajo";
        $result = $db->consulta($sqlcommand);
        $html = "";
        while($row = $db->fetch_array($result)){
            /*
             * seleccionar el registro por default enviado
             */
            if ($row['id']==$sel){
                $html .= "<option value='".$row['id']."' selected>".htmlentities($row['nombre'])."</option>";
            }
            else{
                $html .= "<option value='".$row['id']."'>".htmlentities($row['nombre'])."</option>";
            }
        }
        return $html;
    }
}


class Htmlsexo{
    function llenarlista($sel){
        $db = new MySQL();
        $sqlcommand = "SELECT id, sexo as nombre
                        FROM ctl_sexo";
        $result = $db->consulta($sqlcommand);
        $html = "";
        while($row = $db->fetch_array($result)){
            /*
             * seleccionar el registro por default enviado
             */
            if ($row['id']==$sel){
                $html .= "<option value='".$row['id']."' selected>".htmlentities($row['nombre'])."</option>";
            }
            else{
                $html .= "<option value='".$row['id']."'>".htmlentities($row['nombre'])."</option>";
            }
        }
        return $html;
    }
}



class Htmlresp{
    function llenarlista($sel){
        $db = new MySQL();
        $sqlcommand = "SELECT id, resp as nombre
                        FROM ctl_resp";
        $result = $db->consulta($sqlcommand);
        $html = "";
        while($row = $db->fetch_array($result)){
            /*
             * seleccionar el registro por default enviado
             */
            if ($row['id']==$sel){
                $html .= "<option value='".$row['id']."' selected>".htmlentities($row['nombre'])."</option>";
            }
            else{
                $html .= "<option value='".$row['id']."'>".htmlentities($row['nombre'])."</option>";
            }
        }
        return $html;
    }
}


class Htmldx{
    function llenarlista($sel){
        $db = new MySQL();
        $sqlcommand = "SELECT id, dx as nombre
                        FROM ctl_dx";
        $result = $db->consulta($sqlcommand);
        $html = "";
        while($row = $db->fetch_array($result)){
            /*
             * seleccionar el registro por default enviado
             */
            if ($row['id']==$sel){
                $html .= "<option value='".$row['id']."' selected>".htmlentities($row['nombre'])."</option>";
            }
            else{
                $html .= "<option value='".$row['id']."'>".htmlentities($row['nombre'])."</option>";
            }
        }
        return $html;
    }
}
