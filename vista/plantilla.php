<?php

include_once "vista/modulos/cabecera.php";

if(isset($_GET["ruta"])){

if($_GET["ruta"]=="usuarios" || $_GET["ruta"]=="dependencia" || $_GET["ruta"]=="rh"  ){

    include_once "vista/modulos/".$_GET["ruta"].".php";
}


}
