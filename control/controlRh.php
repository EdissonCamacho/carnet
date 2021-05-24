<?php

include_once "../modelo/modeloRh.php";

class controlRh
{
    public $rh;
    public $id;

    public function ctrlRegistrar()
    {
        $objRegistrar = modeloRh::mdlRegistrar($this->rh);
        echo json_encode($objRegistrar);
    }
    public function ctrlConsultarRh()
    {

        $objConsultaRh = modeloRh::mdlConsultarRh();
        echo json_encode($objConsultaRh);
    }


   public function ctrlModificar(){
       
    $objMod= modeloRh::mdlModificar($this->id,$this->rh);
    echo json_encode($objMod);

   }

   public function ctrlEliminar(){
       $objEliminar = modeloRh::mdlEliminar($this->id);
       echo json_encode($objEliminar);



   }
}

if (isset($_POST["rh"])) {
    $objRegistrar = new controlRh();
    $objRegistrar->rh = $_POST["rh"];
    $objRegistrar->ctrlRegistrar();
}

if (isset($_POST["cargarRh"]) == "ok") {
    $objConsulta = new controlRh();
    $objConsulta->ctrlConsultarRh();
}

if (isset($_POST["idMod"]) && isset($_POST["rhMod"])) {
    $objModificar = new controlRh();
    $objModificar->id = $_POST["idMod"];
    $objModificar->rh = $_POST["rhMod"];
    $objModificar->ctrlModificar();
}

if (isset($_POST["idEliminar"])) {
    $objEliminar = new controlRh();
    $objEliminar->id=$_POST["idEliminar"];
    $objEliminar->ctrlEliminar();

}