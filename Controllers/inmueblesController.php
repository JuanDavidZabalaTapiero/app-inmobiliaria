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

                        <a href="InmoEdit.php?id_inm=<?php echo $fInm["id"] ?>" class="edit"></a>
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

                            <a href="InmoEdit.php?id_inm=<?php echo $fInm["id"] ?>" class="edit"></a>
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
                    <a href="UserShowInmueble.php?id_inm=<?php echo $fInm["id"] ?>">Ver Más</a>
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
                        <a href="UserShowInmueble.php?id_inm=<?php echo $fInm["id"] ?>">Ver Más</a>
                    </div>
                </div>
                <?php
            }
        }
    }

    public function showFormInmoEdit($id_inm)
    {
        // CONSULTO EL INMUEBLE SELECCIONADO
        $fInm = $this->objConsultasInmuebles->selectAllInmuebleId($id_inm);

        ?>
        <form action="" method="post">
            <input type="hidden" name="form" value="edit_inm">
            <div class="select">
                <select name="tipo_inm">
                    <option value="<?php echo $fInm["tipo"] ?>"><?php echo $fInm["tipo"] ?></option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Aparta Estudio">Aparta Estudio</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>

            <div class="select">
                <select name="categoria_inm">
                    <option value="<?php echo $fInm["categoria"] ?>"><?php echo $fInm["categoria"] ?></option>
                    <option value="Arriendo">Arriendo</option>
                    <option value="Venta">Venta</option>
                </select>
            </div>

            <input type="number" placeholder="Precio..." value="<?php echo $fInm["precio"] ?>" name="precio_inm">

            <input type="number" placeholder="Tamaño..." value="<?php echo $fInm["tamaño"] ?>" name="size_inm">

            <input type="text" placeholder="Ciudad..." value="<?php echo $fInm["ciudad"] ?>" name="ciudad_inm">

            <input type="text" placeholder="Localidad/Barrio..." value="<?php echo $fInm["barrio"] ?>" name="barrio_inm">

            <button class="btn-home" type="submit">Modificar</button>
        </form>
        <?php
    }

    public function UserShowInmueble($id_inm)
    {
        $fInm = $this->objConsultasInmuebles->selectAllInmuebleId($id_inm);

        ?>
        <figure class="photo-preview">
            <img src="../../../Uploads/inmuebles/<?php echo $fInm["foto"] ?>" alt="">
        </figure>
        <div class="cont-details">
            <div>
                <article class="info-name">
                    <p><?php echo $fInm["tipo"] ?></p>
                </article>
                <article class="info-category">
                    <p><?php echo $fInm["categoria"] ?></p>
                </article>
                <article class="info-precio">
                    <p>$<?php echo number_format($fInm["precio"], 0, ',', '.') ?></p>
                </article>
                <article class="info-direccion">
                    <p><?php echo $fInm["barrio"] ?>/<?php echo $fInm["ciudad"] ?></p>
                </article>
                <article class="info-tamano">
                    <p><?php echo $fInm["tamaño"] ?>M2</p>
                </article>

                <a href="UserShowInmueble.php?cita=<?php echo $fInm["id"] ?>" class="btn-home">Solictar cita</a>

            </div>
        </div>
        <?php
    }

    // UPDATE
    public function updateInmueble($id_inm, $tipo, $categoria, $precio, $size, $ciudad, $barrio)
    {
        $this->objConsultasInmuebles->updateAllInmueble($id_inm, $tipo, $categoria, $precio, $size, $ciudad, $barrio);

        ?>
        <script>
            alert("Inmueble editado");
            location.href = "InmoApartamentos.php";
        </script>
        <?php
    }

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