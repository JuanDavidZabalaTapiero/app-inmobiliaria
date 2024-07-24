<?php

class ConexionBD
{
    public function getConexion()
    {
        try {
            $host = "";
            $dbName = "inmobiliaria";
            $user = "root";
            $pass = "";

            $conexion = new PDO("mysql:host=$host;dbname=$dbName;", $user, $pass);

            return $conexion;
        } catch (PDOException $e) {
            echo 'Error en la conexión a la BD: ' . $e->getMessage();
        }
    }
}