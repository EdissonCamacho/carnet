<?php

include_once "../modelo/dependenciaModelo.php";
class controlDependencia
{
    public $dependencia;
    public $id;


    public function ctrlRegistrarDependencia()
    {
        $objRespuesta = dependenciaModelo::mdlRegistrar($this->dependencia);
        echo json_encode($objRespuesta);
    }
    public function ctrlCargarRegistros()
    {
        $objRespuesta = dependenciaModelo::mdlConsultar();
        echo json_encode($objRespuesta);


    }

    public function ctrlModificar(){
        $objRespuesta = dependenciaModelo::mdlModificar($this->id,$this->dependencia);
        echo json_encode($objRespuesta);

    }

    public function ctrlEliminar(){
        $objRespuesta = dependenciaModelo::mdlEliminar($this->id);
        echo json_encode($objRespuesta);

        
    }

}

if (isset($_POST["dependencia"])) {

    $objRegistrar = new controlDependencia();
    $objRegistrar->dependencia = $_POST["dependencia"];
    $objRegistrar->ctrlRegistrarDependencia();
}
if (isset($_POST["cargarDependencias"]) == "cargarDependencias") {

    $objConsulta = new controlDependencia();
    $objConsulta->ctrlCargarRegistros();
}

if (isset($_POST["nameMod"] )&& isset($_POST["idMod"])) {
    $objModificar = new controlDependencia();
    $objModificar->id=$_POST["idMod"];
    $objModificar->dependencia=$_POST["nameMod"];
    $objModificar->ctrlModificar();
}

if (isset($_POST["idEliminar"])) {

    $objEliminar = new controlDependencia();
    $objEliminar->id=$_POST["idEliminar"];
    $objEliminar->ctrlEliminar();
    
}
