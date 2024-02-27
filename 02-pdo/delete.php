<?php
    require "config/app.php";
    require "config/database.php";

    if (isset($_GET['id'])) {
        if (deletePet($conx, $_GET['id'])) {
            header("Location: index.php");
        }
    }
