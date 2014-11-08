<?php
class MySQL{
    private $conexion;
    private $total_consultas;
    public function MySQL(){
        require 'config.php'; // parametros para la conexion
        if(!isset($this->conexion)){
            $this->conexion = (mysql_connect($host,$user,$pass)) or die(mysql_error());
            mysql_select_db($database,$this->conexion) or die(mysql_error());
        }
    }
    
    public function consulta($consulta){
        $this->total_consultas++;
        $resultado = mysql_query($consulta,$this->conexion);
        if(!$resultado){
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }
        return $resultado;
    }
    public function fetch_array($consulta){
        return mysql_fetch_array($consulta);
    }
    public function num_rows($consulta){
        return mysql_num_rows($consulta);
    }

    public function result($query,$i,$campo){
        return mysql_result($query,$i,$campo);
    }

    public function getTotalConsultas(){
        return $this->total_consultas;
    }

    public function list_fields($db,$tabla){
        return mysql_list_fields($db,$tabla);
    }

    public function num_fields($list_atrib){
        return mysql_num_fields($list_atrib);
    }
    public function field_name($list_atrib, $i){
        return mysql_field_name($list_atrib, $i);
    }
    public function data_seek($consulta){
        return mysql_data_seek($consulta, 0);
    }
}