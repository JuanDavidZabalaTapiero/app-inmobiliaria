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
        $insertAllInmuebles = "INSERT INTO inmuebles(id, tipo, categoria, precio, tamaño, ciudad, barrio, foto) VALUES ('', :tipo, :categoria, :precio, :size, :ciudad, :barrio, :foto)";

        $bindValues = [
            ':tipo' => $tipo,
            ':categoria' => $categoria,
            ':precio' => $precio,
            ':size' => $tamaño,
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

    public function selectAllInmuebleId($id_inv)
    {
        $selectAllInmuebleId = "SELECT * FROM inmuebles WHERE id = :id";

        $bindValues = [
            ':id' => $id_inv
        ];

        // EJECUTO LA CONSULTA
        $resultSelectAllInmuebleId = $this->objPrepararConsulta->prepararConsulta($selectAllInmuebleId, $bindValues);

        return $resultSelectAllInmuebleId->fetch();
    }

    // UPDATE
    public function updateAllInmueble($id_inm, $tipo, $categoria, $precio, $size, $ciudad, $barrio)
    {
        $updateAllInmueble = "UPDATE inmuebles SET tipo = :tipo, categoria = :categoria, precio = :precio, tamaño = :size, ciudad = :ciudad, barrio = :barrio WHERE id = :id";

        $bindValues = [
            ':tipo' => $tipo,
            ':categoria' => $categoria, 
            ':precio' => $precio, 
            ':size' => $size, 
            ':ciudad' => $ciudad, 
            ':barrio' => $barrio,
            ':id' => $id_inm
        ];

        $this->objPrepararConsulta->prepararConsulta($updateAllInmueble, $bindValues);
    }

    // DELETE
    public function deleteInmueble($id_inm)
    {
        $deleteInmueble = "DELETE FROM inmuebles WHERE id = :id";

        $bindValues = [
            ':id' => $id_inm
        ];

        $this->objPrepararConsulta->prepararConsulta($deleteInmueble, $bindValues);
    }
}