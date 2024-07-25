<?php

require_once (__DIR__ . '/prepararConsulta.php');

class ConsultasSolicitudes
{
    public $objPrepararConsulta;

    public function __construct()
    {
        $this->objPrepararConsulta = new PrepararConsulta();
    }

    // CREATE
    public function insertAllSolicitudes($id_inm, $id_user, $fecha)
    {
        $insertAllSolicitudes = "INSERT INTO solicitudes(id_inm, id_user, fecha) VALUES (:id_inm, :id_user, :fecha)";

        $bindValues = [
            ':id_inm' => $id_inm,
            ':id_user' => $id_user,
            ':fecha' => $fecha
        ];

        $this->objPrepararConsulta->prepararConsulta($insertAllSolicitudes, $bindValues);
    }

    // READ
    public function selectAllSolicitudes()
    {
        $selectAllSolicitudes = "SELECT * 
        FROM solicitudes s
        INNER JOIN inmuebles i ON s.id_inm = i.id
        INNER JOIN usuarios u ON s.id_user = u.id";

        $result = $this->objPrepararConsulta->prepararConsulta($selectAllSolicitudes, 0);

        if ($result->rowCount() == 0) {
            return;
        }

        if ($result->rowCount() == 1) {
            return [
                'resultado' => $result->fetch(),
                'filas' => 1
            ];
        } else {
            return [
                'resultados' => $result->fetchAll(),
                'filas' => 2
            ];
        }
    }

    public function selectAllSolicitud($id_sol)
    {
        $selectAllSolicitud = "SELECT * 
        FROM solicitudes s
        INNER JOIN inmuebles i ON s.id_inm = i.id
        INNER JOIN usuarios u ON s.id_user = u.id
        WHERE id_sol = :id_sol";

        $bindValues = [
            ':id_sol' => $id_sol
        ];

        $result = $this->objPrepararConsulta->prepararConsulta($selectAllSolicitud, $bindValues);

        return $result->fetch();
    }

    // UPDATE

    // DELETE
}