<?php

require_once "conexion.php";
class dependenciaModelo{


    public static function mdlRegistrar($dependencia){
    
        $mensaje ="";
        try {
            $objRegistrar = conexion::conectar()->prepare("INSERT INTO dependencia(nombreDependencia) values (:nombre)");
            $objRegistrar->bindParam(":nombre",$dependencia,PDO::PARAM_STR);
            if ($objRegistrar->execute()) {
                $mensaje="ok";
            }else{
                $mensaje="error";
            }

        } catch (Exception $th) {
            $mensaje=$th;
        }

        return $mensaje;
        $objRegistrar=null;
       

    }


    public static function mdlConsultar(){
            $objConsultar = conexion::conectar()->prepare("SELECT * FROM dependencia");
            $objConsultar->execute();

            $lista= $objConsultar->fetchAll();

            return $lista;

            $objConsultar= null;
     

    }

    public static function mdlModificar($id,$nombreDependencia){  
       
        // Este es el metodo de modificar y $objRegistrar es por que me dio tiempo de cambiar la variable :)
        $mensaje ="";
        try {
            $objRegistrar = conexion::conectar()->prepare("UPDATE dependencia SET nombreDependencia=:nombre where idDependencia=:id ");
            $objRegistrar->bindParam(":nombre",$nombreDependencia,PDO::PARAM_STR);
            $objRegistrar->bindParam(":id",$id,PDO::PARAM_STR);
            if ($objRegistrar->execute()) {
                $mensaje="ok";
            }else{
                $mensaje="error";
            }

        } catch (Exception $th) {
            $mensaje=$th;
        }

        return $mensaje;
        $objRegistrar=null;



    }

    public static function mdlEliminar($id){
        $mensaje ="";
        try {
            $objRegistrar = conexion::conectar()->prepare("DELETE FROM dependencia Where idDependencia=:id ");
            $objRegistrar->bindParam(":id",$id,PDO::PARAM_STR);
            if ($objRegistrar->execute()) {
                $mensaje="ok";
            }else{
                $mensaje="error";
            }

        } catch (Exception $th) {
            $mensaje=$th;
        }

        return $mensaje;
        $objRegistrar=null;


    }
}