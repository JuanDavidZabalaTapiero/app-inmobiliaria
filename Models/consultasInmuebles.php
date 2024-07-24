<?php

require_once (__DIR__ . '/prepararConsulta.php');

class ConsultasInmuebles
{
    public $objPrepararConsulta;

    public function __construct()
    {
        $this->objPrepararConsulta = new PrepararConsulta();
    }

    // CREATE
    public function insertAllInmuebles($tipo, $categoria, $precio, $tamaño, $ciudad, $barrio, $foto)
    {
        $insertAllInmuebles = "INSERT INTO inmuebles(tipo, categoria, precio, tamaño, ciudad, barrio, foto) 
        VALUES (:tipo, :categoria, :precio, :tamaño, :ciudad, :barrio, :foto)";

        $bindValues = [
            ':tipo' => $tipo,
            ':categoria' => $categoria,
            ':precio' => $precio,
            ':tamaño' => $tamaño,
            ':ciudad' => $ciudad,
            ':barrio' => $barrio,
            ':foto' => $foto
        ];

        // EJECUTO LA CONSULTA
        $this->objPrepararConsulta->prepararConsulta($insertAllInmuebles, $bindValues);
    }

    // READ
    public function selectAllInmuebles()
    {
        $selectAllInmuebles = "SELECT * FROM inmuebles";

        // EJECUTO LA CONSULTA
        $resultselectAllInmuebles = $this->objPrepararConsulta->prepararConsulta($selectAllInmuebles, 0);

        if ($resultselectAllInmuebles->rowCount() == 0) {
            return;
        }

        if ($resultselectAllInmuebles->rowCount() == 1) {
            return [
                'resultado' => $resultselectAllInmuebles->fetch(),
                'filas' => 1
            ];
        } else {
            return [
                'resultados' => $resultselectAllInmuebles->fetchAll(),
                'filas' => 2
            ];
        }
    }

    // UPDATE

    // DELETE
}