<?php

require_once (__DIR__ . '/../Models/consultasSolicitudes.php');

class SolicitudesController
{
    public $objConsultasSolicitudes;

    public function __construct()
    {
        $this->objConsultasSolicitudes = new ConsultasSolicitudes();
    }

    // CREATE

    // READ
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
                        <a href="InmoShowSolicitud.php?id_soli=<?php echo $fSoli["id_sol"] ?>" class="show"></a>
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
                            <a href="InmoShowSolicitud.php?id_soli=<?php echo $fSoli["id_sol"] ?>" class="show"></a>
                        </div>
                    </td>
                </tr>
                <?php
            }
        }
    }

    public function showInmoShowSolicitud($id_soli)
    {
        // CONSULTO LA SOLICITUD
        $fSoli = $this->objConsultasSolicitudes->selectAllSolicitud($id_soli);

        ?>
        <figure class="photo-preview">
            <img src="../../../Uploads/inmuebles/<?php echo $fSoli["foto"] ?>" alt="">
        </figure>
        <div class="cont-details">
            <div>
                <article class="info-name">
                    <p><?php echo $fSoli["tipo"] ?></p>
                </article>
                <article class="info-category">
                    <p><?php echo $fSoli["categoria"] ?></p>
                </article>
                <article class="info-precio">
                    <p><?php echo number_format($fSoli["precio"], 0, ',', '.') ?></p>
                </article>
                <article class="info-direccion">
                    <p><?php echo $fSoli["barrio"] ?>/<?php echo $fSoli["ciudad"] ?></p>
                </article>
                <hr>
                <br>
                <article class="info-fecha">
                    <p><?php echo $fSoli["fecha"] ?></p>
                </article>
                <article class="info-usuario">
                    <p><?php echo $fSoli["nombres"] . ' ' . $fSoli["apellidos"] ?></p>
                </article>
                <article class="info-telefono">
                    <p><?php echo $fSoli["telefono"] ?></p>
                </article>
                <article class="info-correo">
                    <p><?php echo $fSoli["correo"] ?></p>
                </article>
            </div>
        </div>
        <?php
    }

    // UPDATE

    // DELETE
}