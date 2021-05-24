<?php

require_once "conexion.php";
class modeloRh{


    public static function mdlRegistrar($rh){
        $mensaje="";

        try {
            $objConexion = conexion::conectar()->prepare("INSERT INTO rh(rh) values (:rh)");
            $objConexion->bindParam(":rh",$rh,PDO::PARAM_STR);
            if ($objConexion->execute()) {
                $mensaje="ok";
            }else{
                $mensaje="error";
            }
        } catch (Exception $e) {
            $mensaje=$e;
        }

        return $mensaje;




    }


    public static function mdlConsultarRh(){

      $objConsulta = conexion::conectar()->prepare("SELECT * FROM rh");

      $objConsulta->execute();

      $lista= $objConsulta->fetchAll();

      return $lista;
      
      $objConsulta=null;



    }

    public static function mdlModificar($id,$rh){
      
        $mensaje="";

        try {
            $objConexion = conexion::conectar()->prepare("UPDATE rh SET rh=:rh WHERE idRh=:id");
            $objConexion->bindParam(":rh",$rh,PDO::PARAM_STR);
            $objConexion->bindParam(":id",$id,PDO::PARAM_STR);

            if ($objConexion->execute()) {
                $mensaje="ok";
            }else{
                $mensaje="error";
            }
        } catch (Exception $e) {
            $mensaje=$e;
        }

        return $mensaje;



    }

    public static function mdlEliminar($id){

        $mensaje="";

        try {
            $objConexion = conexion::conectar()->prepare("DELETE FROM rh WHERE idRh=:id");
            $objConexion->bindParam(":id",$id,PDO::PARAM_STR);

            if ($objConexion->execute()) {
                $mensaje="ok";
            }else{
                $mensaje="error";
            }
        } catch (Exception $e) {
            $mensaje=$e;
        }

        return $mensaje;



    }

}