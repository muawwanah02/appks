 <!-- Sidebar -->
 <?php
    $menu = array(
        "dashboard" => "fw-bold",
        "kasusstunting" => "fw-bold",
        "gizianak" => "fw-bold",
        "orangtua" => "fw-bold",
        "anak" => "fw-bold",
        "pegawai" => "fw-bold",
        "desa" => "fw-bold",
    );

    $page = (isset($_GET["page"])) ? $_GET["page"] : $page = "";

    switch ($page) {
        case "":
        case "dashboard":
        case "profil":
        case "ubahpassword":
            $menu["dashboard"] = "active";
            break;
        case "pegawaidata":
        case "pegawaitambah":
        case "pegawaiubah":
            $menu["pegawai"] = "active";
            break;
        case "orangtuadata":
        case "orangtuatambah":
        case "orangtuaubah":
            $menu["orangtua"] = "active";
            break;
        case "anakdata":
        case "anaktambah":
        case "anakubah":
            $menu["anak"] = "active";
            break;
        case "desadata":
        case "desatambah":
        case "desaubah":
            $menu["desa"] = "active";
            break;
        case "gizianakdata":
        case "gizianaktambah":
        case "gizianakubah":
            $menu["gizianak"] = "active";
            break;
        case "kasusstuntingdata":
        case "kasusstuntingtambah":
        case "kasusstuntingubah":
            $menu["kasusstunting"] = "active";
            break;
        default:
            include "pages/404.php";
    }

    ?>
 <div class="bg-white" id="sidebar-wrapper">
     <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-money-bill me-2"></i>APPKS</div>
     <div class="list-group list-group-flush my-3">
         <a href="index.php" class="list-group-item list-group-item-action bg-transparent abu-text  <?= $menu["dashboard"] ?>"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
         <?php
            if ($_SESSION["level"] == "admin") {
            ?>
             <a href="?page=pegawaidata" class="list-group-item list-group-item-action bg-transparent abu-text <?= $menu["pegawai"] ?>"><i class="fas fa-users me-2"></i>Data Pegawai</a>
         <?php
            }
            ?>
         <a href="?page=orangtuadata" class="list-group-item list-group-item-action bg-transparent abu-text <?= $menu["orangtua"] ?>"><i class="fa-solid fa-people-roof me-2"></i>Data Orang Tua</a>
         <a href="?page=anakdata" class="list-group-item list-group-item-action bg-transparent abu-text <?= $menu["anak"] ?>"><i class="fa-solid fa-children me-2"></i>Data Anak</a>
         <a href="?page=desadata" class="list-group-item list-group-item-action bg-transparent abu-text <?= $menu["desa"] ?>"><i class="fa-solid fa-city me-2"></i>Data Desa</a>
         <a href="?page=gizianakdata" class="list-group-item list-group-item-action bg-transparent abu-text <?= $menu["gizianak"] ?>"><i class="fa-solid fa-weight-scale me-2"></i>Data Gizi Anak</a>
         <a href="?page=kasusstuntingdata" class="list-group-item list-group-item-action bg-transparent abu-text <?= $menu["kasusstunting"] ?>"><i class="fa-solid fa-triangle-exclamation me-2"></i>Data Kasus Stunting</a>
         <form action="" method="post">
             <button name="logout_button" type="submit" onclick="javascript: return confirm('Yakin keluar?');" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                 <i class="fas fa-power-off me-2"></i>Logout
             </button>
         </form>
     </div>
 </div>
 <!-- /#sidebar-wrapper -->
