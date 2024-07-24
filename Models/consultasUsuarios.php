<?php

require_once (__DIR__ . '/prepararConsulta.php');

class ConsultasUsuarios
{
    public $objPrepararConsulta;

    public function __construct()
    {
        $this->objPrepararConsulta = new PrepararConsulta();
    }

    // CREATE
    public function insertUsuario($id_user, $nombres, $apellidos, $telefono, $correo, $clave, $rol)
    {
        $insertUsuario = "INSERT INTO usuarios(id, nombres, apellidos, telefono, correo, clave, rol) VALUES (:id, :nombres, :apellidos, :telefono, :correo, :clave, :rol)";

        $bindValues = [
            ':id' => $id_user,
            ':nombres' => $nombres,
            ':apellidos' => $apellidos,
            ':telefono' => $telefono,
            ':correo' => $correo,
            ':clave' => $clave,
            ':rol' => $rol
        ];

        // EJECUTO LA CONSULTA
        $this->objPrepararConsulta->prepararConsulta($insertUsuario, $bindValues);
    }

    // READ
    public function selectUsuario($id_user)
    {
        $selectUsuario = "SELECT * FROM usuarios WHERE id = :id";

        $bindValues = [
            ':id' => $id_user
        ];

        // EJECUTO LA CONSULTA
        $resultSelectUsuario = $this->objPrepararConsulta->prepararConsulta($selectUsuario, $bindValues);

        // RETORNO EL FETCH
        return $resultSelectUsuario->fetch();
    }

    public function selectUsuarioEmail($correo)
    {
        $selectUsuarioEmail = "SELECT * FROM usuarios WHERE correo = :correo";

        $bindValues = [
            ':correo' => $correo
        ];

        // EJECUTO LA CONSULTA
        $resultSelectUsuarioEmail = $this->objPrepararConsulta->prepararConsulta($selectUsuarioEmail, $bindValues);

        return $resultSelectUsuarioEmail->fetch();
    }

    // UPDATE

    // DELETE
}