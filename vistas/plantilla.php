<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TURISBOL | ReservasWeb</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="vistas/dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
<!-- Site wrapper -->


  <!-- =============================================== -->
    <?php

      if(isset($_SESSION["iniciarsesion"]) && $_SESSION["iniciarsesion"] = "ok"){

        echo '<div class="wrapper">';

        include "modulos/cabezote.php";
        include "modulos/menu.php";

        if(isset($_GET["ruta"])){
          if($_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "usuarios" ||
            $_GET["ruta"] == "buses" ||
            $_GET["ruta"] == "destinos" ||
            $_GET["ruta"] == "reservas" ||
            $_GET["ruta"] == "salir" ){

            include "modulos/".$_GET["ruta"].".php";
          } else{
            include "modulos/404.php";
          }
        }else{
          include "modulos/inicio.php";
        }
        /*
        include "modulos/inicio.php";*/
        
        include "modulos/pie.php";  
        
        echo '</div>';
      } else{
        include "principal.php";
      }
    ?>
  <!-- =============================================== -->


<!-- ./wrapper -->

<script src="vistas/js/plantilla.js"></script>
</body>
</html>
