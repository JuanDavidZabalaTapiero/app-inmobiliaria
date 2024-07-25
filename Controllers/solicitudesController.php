<?php

require_once (__DIR__ . '/../Models/consultasSolicitudes.php');

class SolicitudesController
{
    public $objConsultasSolicitudes;

    public function __construct()
    {
        $this->objConsultasSolicitudes = new ConsultasSolicitudes();
    }

    public function showInmoSolicitudes()
    {
        $arraySelectAllSolicitudes = $this->objConsultasSolicitudes->selectAllSolicitudes();

        $filas = $arraySelectAllSolicitudes['filas'];

        if ($filas == 1) {
            $fSoli = $arraySelectAllSolicitudes['resultado'];

            ?>
            <tr>
                <td>
                    <figure class="photo">
                        <img src="../../../Uploads/inmuebles/<?php echo $fSoli["foto"] ?>" alt="">
                    </figure>
                    <div class="info">
                        <h3><?php echo $fSoli["tipo"] ?></h3>
                        <p><?php echo $fSoli["ciudad"] ?>/<?php echo $fSoli["barrio"] ?></p>
                        <p><?php echo $fSoli["nombres"] . ' ' . $fSoli["apellidos"] ?></p>
                    </div>
                    <div class="controls">
                        <a href="InmoShowSolicitud.html" class="show"></a>
                    </div>
                </td>
            </tr>
            <?php
        }

        if ($filas == 2) {
            $fSolis = $arraySelectAllSolicitudes['resultados'];

            foreach ($fSolis as $fSoli) {
                ?>
                <tr>
                    <td>
                        <figure class="photo">
                            <img src="../../../Uploads/inmuebles/<?php echo $fSoli["foto"] ?>" alt="">
                        </figure>
                        <div class="info">
                            <h3><?php echo $fSoli["tipo"] ?></h3>
                            <p><?php echo $fSoli["ciudad"] ?>/<?php echo $fSoli["barrio"] ?></p>
                            <p><?php echo $fSoli["nombres"] . ' ' . $fSoli["apellidos"] ?></p>
                        </div>
                        <div class="controls">
                            <a href="InmoShowSolicitud.html" class="show"></a>
                        </div>
                    </td>
                </tr>
                <?php
            }
        }
    }
}