<?php
require 'common.html';
echo "<center>".$_SESSION['username'].' - '.$_SESSION['rol']."</center>";
include ("./conexion.php");
require 'menuprincipal.php';

