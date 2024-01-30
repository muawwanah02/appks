 <!-- Sidebar -->
 <?php
    $menu = array(
        "dashboard" => "fw-bold",
        "kasusstunting" => "fw-bold",
        "gizianak" => "fw-bold",
        "master" => "fw-bold",
    );

    $collapse = array(
        "master" => "",
    );

    $sub = array(
        "orangtua" => "link-dark",
        "anak" => "link-dark",
        "pegawai" => "link-dark",
        "desa" => "link-dark",
    );

    $page = (isset($_GET["page"])) ? $_GET["page"] : $page = "";

    switch ($page) {
        case "":
        case "dashboard":
        case "profil":
        case "ubahpassword":
            $menu["dashboard"] = "active";
            break;
        case "orangtuadata":
        case "orangtuatambah":
        case "orangtuaubah":
            $menu["master"] = "active";
            $collapse["master"] = "show";
            $sub["orangtua"] = "link-success";
            break;
        case "anakdata":
        case "anaktambah":
        case "anakubah":
            $menu["master"] = "active";
            $collapse["master"] = "show";
            $sub["anak"] = "link-success";
            break;
        case "pegawaidata":
        case "pegawaitambah":
        case "pegawaiubah":
            $menu["master"] = "active";
            $collapse["master"] = "show";
            $sub["pegawai"] = "link-success";
            break;
        case "desadata":
        case "desatambah":
        case "desaubah":
            $menu["master"] = "active";
            $collapse["master"] = "show";
            $sub["desa"] = "link-success";
            break;
        case "kasusstuntingdata":
        case "kasusstuntingtambah":
        case "kasusstuntingubah":
            $menu["kasusstunting"] = "active";
            break;
        case "gizianakdata":
        case "gizianaktambah":
        case "gizianakubah":
            $menu["gizianak"] = "active";
            break;
        default:
            include "pages/404.php";
    }

    ?>
 <div class="bg-white" id="sidebar-wrapper">
     <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-money-bill me-2"></i>APPKS</div>
     <div class="list-group list-group-flush my-3">
         <a href="index.php" class="list-group-item list-group-item-action bg-transparent abu-text  <?= $menu["dashboard"] ?>"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
         <a href="?page=kasusstuntingdata" class="list-group-item list-group-item-action bg-transparent abu-text <?= $menu["kasusstunting"] ?>"><i class="fa-solid fa-triangle-exclamation me-2"></i>Kasus Stunting</a>
         <a href="?page=gizianakdata" class="list-group-item list-group-item-action bg-transparent abu-text <?= $menu["gizianak"] ?>"><i class="fa-solid fa-weight-scale me-2"></i>Gizi Anak</a>
         <button class="list-group-item list-group-item-action bg-transparent abu-text <?= $menu["master"] ?>" data-bs-toggle="collapse" data-bs-target="#master-collapse" aria-expanded="true">
             <i class="fas fa-list me-2"></i>Master
         </button>
         <div class="collapse  <?= $collapse["master"] ?>" id="master-collapse">
             <ul class="btn-toggle-nav list-unstyled ps-4">
                 <li><a href="?page=orangtuadata" class="<?= $sub["orangtua"] ?> rounded">Orang Tua</a></li>
                 <li><a href="?page=anakdata" class="<?= $sub["anak"] ?> rounded">Anak</a></li>
                 <?php
                    if ($_SESSION["level"] == "admin") {
                    ?>
                     <li><a href="?page=pegawaidata" class="<?= $sub["pegawai"] ?> rounded">Pegawai</a></li>
                 <?php
                    }
                    ?>
                 <li><a href="?page=desadata" class="<?= $sub["desa"] ?> rounded">Desa</a></li>
             </ul>
         </div>
         <form action="" method="post">
             <button name="logout_button" type="submit" onclick="javascript: return confirm('Yakin keluar?');" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                 <i class="fas fa-power-off me-2"></i>Logout
             </button>
         </form>
     </div>
 </div>
 <!-- /#sidebar-wrapper -->
