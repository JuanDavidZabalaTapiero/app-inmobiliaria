<?php

require_once (__DIR__ . '/../Models/consultasInmuebles.php');

class InmueblesController
{
    public $objConsultasInmuebles;

    public function __construct()
    {
        $this->objConsultasInmuebles = new ConsultasInmuebles();
    }

    // CREATE
    public function insertInmueble($tipo_inm, $categoria_inm, $precio_inm, $tamaño_inm, $ciudad_inm, $barrio_inm, $foto_inm)
    {
        $this->objConsultasInmuebles->insertAllInmuebles($tipo_inm, $categoria_inm, $precio_inm, $tamaño_inm, $ciudad_inm, $barrio_inm, $foto_inm);

        ?>
        <script>
            alert("Registro del inmueble exitoso!");
            location.href = "InmoApartamentos.php";
        </script>
        <?php
    }

    // READ
    public function showAdministrarInmuebles()
    {
        $arraySelectAllInmuebles = $this->objConsultasInmuebles->selectAllInmuebles();

        $filas = $arraySelectAllInmuebles['filas'];

        if ($filas == 1) {
            $fInm = $arraySelectAllInmuebles['resultado'];

            ?>
            <tr>
                <td>
                    <figure class="photo">
                        <img src="../../../Uploads/inmuebles/<?php echo $fInm["foto"] ?>" alt="">
                    </figure>
                    <div class="info">
                        <h3><?php echo $fInm["tipo"] ?></h3>
                        <h4>$<?php echo $fInm["precio"] ?></h4>
                        <p><?php echo $fInm["ciudad"] ?>/<?php echo $fInm["barrio"] ?></p>
                    </div>
                    <div class="controls">

                        <a href="InmoEdit.html" class="edit"></a>
                        <a href="InmoApartamentos.php?id_inm=<?php echo $fInm["id"] ?>" class="delete"></a>
                    </div>
                </td>
            </tr>
            <?php
        }

        if ($filas == 2) {
            $fInmuebles = $arraySelectAllInmuebles['resultados'];

            foreach ($fInmuebles as $fInm) {
                ?>
                <tr>
                    <td>
                        <figure class="photo">
                            <img src="../../../Uploads/inmuebles/<?php echo $fInm["foto"] ?>" alt="">
                        </figure>
                        <div class="info">
                            <h3><?php echo $fInm["tipo"] ?></h3>
                            <h4>$<?php echo number_format($fInm["precio"], 0, ',', '.') ?></h4>
                            <p><?php echo $fInm["ciudad"] ?>/<?php echo $fInm["barrio"] ?></p>
                        </div>
                        <div class="controls">

                            <a href="InmoEdit.html" class="edit"></a>
                            <a href="InmoApartamentos.php?id_inm=<?php echo $fInm["id"] ?>" class="delete"></a>
                        </div>
                    </td>
                </tr>
                <?php
            }
        }
    }

    public function showInmueblesUserDashboard()
    {
        $arraySelectAllInmuebles = $this->objConsultasInmuebles->selectAllInmuebles();

        $filas = $arraySelectAllInmuebles['filas'];

        if ($filas == 1) {
            $fInm = $arraySelectAllInmuebles['resultado'];

            ?>
            <div class="card-inmueble">
                <img src="../../../Uploads/inmuebles/<?php echo $fInm["foto"] ?>" alt="">
                <div class="info-card">
                    <h4>Valor de Arriendo:</h4>
                    <h2>$<?php echo number_format($fInm["precio"], 0, ',', '.') ?></h2>
                    <p><?php echo $fInm["tipo"] ?> - <?php echo $fInm["tamaño"] ?>m2</p>
                    <p class="direccion"><?php echo $fInm["ciudad"] ?>/<?php echo $fInm["barrio"] ?></p>
                    <a href="UserShowInmueble.html">Ver Más</a>
                </div>
            </div>
            <?php
        }

        if ($filas == 2) {
            $fInmuebles = $arraySelectAllInmuebles['resultados'];

            foreach ($fInmuebles as $fInm) {
                ?>
                <div class="card-inmueble">
                    <img src="../../../Uploads/inmuebles/<?php echo $fInm["foto"] ?>" alt="">
                    <div class="info-card">
                        <h4>Valor de Arriendo:</h4>
                        <h2>$<?php echo number_format($fInm["precio"], 0, ',', '.') ?></h2>
                        <p><?php echo $fInm["tipo"] ?> - <?php echo $fInm["tamaño"] ?>m2</p>
                        <p class="direccion"><?php echo $fInm["ciudad"] ?>/<?php echo $fInm["barrio"] ?></p>
                        <a href="UserShowInmueble.html">Ver Más</a>
                    </div>
                </div>
                <?php
            }
        }
    }

    // UPDATE

    // DELETE
    public function deleteInm($id_inm)
    {
        // ELIMINO EL INMUEBLE
        $this->objConsultasInmuebles->deleteInmueble($id_inm);

        // REDIRECCIONO
        ?>
        <script>
            alert("Se eliminó el inmueble");
            location.href = "InmoApartamentos.php";
        </script>
        <?php
    }
}