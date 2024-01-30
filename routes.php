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

    case "anakdata":
        include "pages/anak/anakdata.php";
        break;
    case "anaktambah":
        include "pages/anak/anaktambah.php";
        break;
    case "anakubah":
        include "pages/anak/anakubah.php";
        break;
    case "anakhapus":
        include "pages/anak/anakhapus.php";
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

    case "kasusstuntingdata":
        include "pages/kasusstunting/kasusstuntingdata.php";
        break;
    case "kasusstuntingtambah":
        include "pages/kasusstunting/kasusstuntingtambah.php";
        break;
    case "kasusstuntingubah":
        include "pages/kasusstunting/kasusstuntingubah.php";
        break;
    case "kasusstuntinghapus":
        include "pages/kasusstunting/kasusstuntinghapus.php";
        break;

    case "gizianakdata":
        include "pages/gizianak/gizianakdata.php";
        break;
    case "gizianaktambah":
        include "pages/gizianak/gizianaktambah.php";
        break;
    case "gizianakubah":
        include "pages/gizianak/gizianakubah.php";
        break;
    case "gizianakhapus":
        include "pages/gizianak/gizianakhapus.php";
        break;

    case "ubahpassword":
        include "pages/ubahpassword.php";
        break;

    default:
        include "pages/404.php";
}
