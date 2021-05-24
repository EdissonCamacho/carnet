<?php

include_once "../modelo/usuarioModelo.php";
class controlUsuario
{

    public $idUsuario;
    public $documento;
    public $nombre;
    public $apellido;
    public $direccion;
    public $telefono;
    public $url;
    public $idDependencia;
    public $idRh;


    public function ctrlConsultarRh()
    {

        $objConsultaRh = usuarioModelo::mdlConsultarRh();
        echo json_encode($objConsultaRh);
    }
    public function ctrlConsultarDependencias()
    {
        $objRespuesta = usuarioModelo::mdlConsultarDependencia();
        echo json_encode($objRespuesta);


    }

    public function ctrlRegistrar(){

        $objRespuesta= usuarioModelo::mdlInsertar($this->documento,$this->nombre,$this->apellido,$this->direccion,$this->telefono,$this->url,$this->idDependencia,$this->idRh);
        echo json_encode($objRespuesta);



    }

    public function ctrlConsultarDatos(){

        $objConsulta=usuarioModelo::mdlConsultaDatos();
        echo json_encode($objConsulta);



    }

    public function ctrlModificar(){
        $objModificar = usuarioModelo::mdlModificar($this->idUsuario,$this->documento,$this->nombre,$this->apellido,$this->direccion,$this->telefono,$this->url,$this->idDependencia,$this->idRh);
        echo json_encode($objModificar);




    }

    public function ctrlEliminar(){

        $objEliminar=usuarioModelo::mdlEliminar($this->idUsuario);
        echo json_encode($objEliminar);


    }

}

if (isset($_POST["cargarRh"]) == "ok") {

    $objConsultaRh = new controlUsuario();
    $objConsultaRh->ctrlConsultarRh();
}

if (isset($_POST["cargarDependencias"]) == "cargarDependencias") {
   $objConsulta = new controlUsuario();
   $objConsulta->ctrlConsultarDependencias();
}

if (isset($_POST["documento"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["direccion"]) && isset($_POST["telefono"]) && isset($_POST["url"]) && isset($_POST["idDependencia"]) && isset($_POST["idRh"]) ) {
   
    $objRegistrar = new controlUsuario();
    $objRegistrar->documento=$_POST["documento"];
    $objRegistrar->nombre=$_POST["nombre"];
    $objRegistrar->apellido=$_POST["apellido"];
    $objRegistrar->direccion=$_POST["direccion"];
    $objRegistrar->telefono=$_POST["telefono"];
    $objRegistrar->url=$_POST["url"];
    $objRegistrar->idDependencia=$_POST["idDependencia"];
    $objRegistrar->idRh=$_POST["idRh"];

    $objRegistrar->ctrlRegistrar();




}

if (isset($_POST["cargarTabla"])=="ok") {
    
    $objConsultar= new controlUsuario();
    $objConsultar->ctrlConsultarDatos();
}


if(isset($_POST["idEliminar"])){
    $objEliminar = new controlUsuario();
    $objEliminar->idUsuario=$_POST["idEliminar"];
    $objEliminar->ctrlEliminar();


}


if (isset($_POST["idModUsuario"]) && isset($_POST["documentoMod"]) && isset($_POST["nombreMod"]) && isset($_POST["apellidoMod"]) && isset($_POST["direccionMod"]) && isset($_POST["telefonoMod"]) && isset($_POST["urlMod"]) && isset($_POST["idDependenciaMod"]) && isset($_POST["idRhMod"]) ) {
   
    $objModificar = new controlUsuario();
    $objModificar->idUsuario=$_POST["idModUsuario"];
    $objModificar->documento=$_POST["documentoMod"];
    $objModificar->nombre=$_POST["nombreMod"];
    $objModificar->apellido=$_POST["apellidoMod"];
    $objModificar->direccion=$_POST["direccionMod"];
    $objModificar->telefono=$_POST["telefonoMod"];
    $objModificar->url=$_POST["urlMod"];
    $objModificar->idDependencia=$_POST["idDependenciaMod"];
    $objModificar->idRh=$_POST["idRhMod"];

    $objModificar->ctrlModificar();




}