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