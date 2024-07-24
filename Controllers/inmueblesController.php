<?php

class InmueblesController
{
    public $objConsultasInmuebles;

    public function __construct()
    {
        $this->objConsultasInmuebles = new ConsultasInmuebles();
    }

    public function showAdministrarInmuebles()
    {
        $arraySelectAllInmuebles = $this->objConsultasInmuebles->selectAllInmuebles();

        ?>
        <tr>
            <td>
                <figure class="photo">
                    <img src="../../imgs/inmueble-1.png" alt="">
                </figure>
                <div class="info">
                    <h3>Apartamento</h3>
                    <h4>$2.400.000</h4>
                    <p>Bogotá/Engativa</p>
                </div>
                <div class="controls">

                    <a href="InmoEdit.html" class="edit"></a>
                    <a href="#" class="delete"></a>
                </div>
            </td>
        </tr>
        <?php
    }
}