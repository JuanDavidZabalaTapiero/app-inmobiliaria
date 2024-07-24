<?php

require_once (__DIR__ . '/conexionBD.php');

class PrepararConsulta
{
    public $objConexionBD;

    public $conexion;

    public function __construct()
    {
        $this->objConexionBD = new ConexionBD();

        $this->conexion = $this->objConexionBD->getConexion();
    }

    public function prepararConsulta($consulta, $bindValues)
    {
        $consultaPreparada = $this->conexion->prepare($consulta);

        if ($bindValues != 0) {
            foreach ($bindValues as $key => $value) {
                $consultaPreparada->bindValue($key, $value);
            }
        }

        $consultaPreparada->execute();

        return $consultaPreparada;
    }
}