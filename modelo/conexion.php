<?php

class conexion{


    public static function conectar(){
     
        $nombreServidor="bzq6lsly1uu33jnygtpo-mysql.services.clever-cloud.com";
        $baseDatos="bzq6lsly1uu33jnygtpo";
        $usuarioServidor="bzq6lsly1uu33jnygtpo";
        $password="pNXvYGQpOl8BjuOrRzy3";

        try {

            $objConexion = new PDO('mysql:host='.$nombreServidor.';dbname='.$baseDatos.';',$usuarioServidor,$password); //instanciar conexion
            $objConexion->exec("set names utf8");

        } catch (Exception $e) {
            $objConexion=$e;
        }
        
        return $objConexion;

    }
}