<?php
require_once "conexion.php";
class usuarioModelo
{

    public static function mdlInsertar($documento,$nombre,$apellido,$direccion,$telefono,$url,$idDependencia,$idRh){
     
        $mensaje="";

        try {
            $objConexion = conexion::conectar()->prepare("INSERT INTO usuarios(documento,nombres,apellidos,direccion,telefono,url,idDependencia,idRh) values (:doc,:nom,:apellidos,:direccion,:telefono,:url,:idDependencia,:idRh)");
            $objConexion->bindParam(":doc",$documento,PDO::PARAM_STR);
            $objConexion->bindParam(":nom",$nombre,PDO::PARAM_STR);
            $objConexion->bindParam(":apellidos",$apellido,PDO::PARAM_STR);
            $objConexion->bindParam(":direccion",$direccion,PDO::PARAM_STR);
            $objConexion->bindParam(":telefono",$telefono,PDO::PARAM_STR);
            $objConexion->bindParam(":url",$url,PDO::PARAM_STR);
            $objConexion->bindParam(":idDependencia",$idDependencia,PDO::PARAM_INT);
            $objConexion->bindParam(":idRh",$idRh,PDO::PARAM_INT);
            

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


    public static function mdlConsultarRh()
    {

        $objConsulta = conexion::conectar()->prepare("SELECT * FROM rh");

        $objConsulta->execute();

        $listaConsulta = $objConsulta->fetchAll();

        return $listaConsulta;
        $objConsulta = null;
    }

    public static function mdlConsultarDependencia()
    {

        $objConsulta = conexion::conectar()->prepare("SELECT * FROM dependencia");

        $objConsulta->execute();

        $listaConsulta = $objConsulta->fetchAll();

        return $listaConsulta;
        $objConsulta = null;
    }


    public static function mdlConsultaDatos(){

        $objConsulta = conexion::conectar()->prepare("SELECT usuarios.idUsuario,usuarios.documento,usuarios.nombres,usuarios.apellidos,usuarios.direccion,usuarios.telefono,usuarios.url,usuarios.idDependencia,dependencia.nombreDependencia,usuarios.idRh,rh.rh from usuarios inner join dependencia on usuarios.idDependencia=dependencia.idDependencia inner join rh on usuarios.idRh=rh.idRh");

        $objConsulta->execute();

        $listaConsulta = $objConsulta->fetchAll();

        return $listaConsulta;
        $objConsulta = null;
    }
    
    public static function mdlModificar($id,$documento,$nombres,$apellidos,$direccion,$telefono,$url,$idDependencia,$idRh){
    
        $mensaje="";

        try {
            $objConexion = conexion::conectar()->prepare("UPDATE usuarios SET documento=:doc,nombres=:nom,apellidos=:apellidos,direccion=:direccion,telefono=:telefono,url=:url,idDependencia=:idDependencia,idRh=:idRh WHERE idUsuario=:id");
            $objConexion->bindParam(":id",$id,PDO::PARAM_INT);
            $objConexion->bindParam(":doc",$documento,PDO::PARAM_STR);
            $objConexion->bindParam(":nom",$nombres,PDO::PARAM_STR);
            $objConexion->bindParam(":apellidos",$apellidos,PDO::PARAM_STR);
            $objConexion->bindParam(":direccion",$direccion,PDO::PARAM_STR);
            $objConexion->bindParam(":telefono",$telefono,PDO::PARAM_STR);
            $objConexion->bindParam(":url",$url,PDO::PARAM_STR);
            $objConexion->bindParam(":idDependencia",$idDependencia,PDO::PARAM_INT);
            $objConexion->bindParam(":idRh",$idRh,PDO::PARAM_INT);
            

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

    public static function mdlEliminar($idEliminar){

        $mensaje="";

        try {
            $objConexion = conexion::conectar()->prepare("DELETE FROM usuarios where idUsuario=:id");
            $objConexion->bindParam(":id",$idEliminar,PDO::PARAM_INT);
      
            

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
