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
        ?>
        <figure class="photo-preview">
            <img src="../imgs/inmueble-1.png" alt="">
        </figure>
        <div class="cont-details">
            <div>
                <article class="info-name">
                    <p>Apartamento</p>
                </article>
                <article class="info-category">
                    <p>Arriendo</p>
                </article>
                <article class="info-precio">
                    <p>$2.400.000</p>
                </article>
                <article class="info-direccion">
                    <p>Engativa/Bogotá</p>
                </article>
                <hr>
                <br>
                <article class="info-fecha">
                    <p>2023-05-05</p>
                </article>
                <article class="info-usuario">
                    <p>Nombre Usuario</p>
                </article>
                <article class="info-telefono">
                    <p>3212344455</p>
                </article>
                <article class="info-correo">
                    <p>user@gmail.com</p>
                </article>
            </div>
        </div>
        <?php
    }

    // UPDATE

    // DELETE
}