<?php

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "";
}

switch ($page) {
    case "":
    case "dashboard":
        include "pages/dashboard.php";
        break;
    case "desadata":
        include "pages/desa/desadata.php";
        break;
    case "desatambah":
        include "pages/desa/desatambah.php";
        break;
    case "desaubah":
        include "pages/desa/desaubah.php";
        break;
    case "desahapus":
        include "pages/desa/desahapus.php";
        break;


    case "orangtuadata":
        include "pages/orangtua/orangtuadata.php";
        break;
    case "orangtuatambah":
        include "pages/orangtua/orangtuatambah.php";
        break;
    case "orangtuaubah":
        include "pages/orangtua/orangtuaubah.php";
        break;
    case "orangtuahapus":
        include "pages/orangtua/orangtuahapus.php";
        break;
        
    case "pegawaidata":
        include "pages/pegawai/pegawaidata.php";
        break;
    case "pegawaitambah":
        include "pages/pegawai/pegawaitambah.php";
        break;
    case "pegawaiubah":
        include "pages/pegawai/pegawaiubah.php";
        break;
    case "pegawaihapus":
        include "pages/pegawai/pegawaihapus.php";
        break;


    case "ubahpassword":
        include "pages/ubahpassword.php";
        break;

    default:
        include "pages/404.php";
}
