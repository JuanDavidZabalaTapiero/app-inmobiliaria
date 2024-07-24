<?php

session_start();

if (!isset($_SESSION["aut"])) {
    ?>
    <script>
        alert("No tienes permiso para entrar a este enlance");
        location.href = "../../../index.html";
    </script>
    <?php
}