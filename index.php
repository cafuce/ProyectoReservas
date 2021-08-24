<?php
  require_once ("controladores/plantilla.controlador.php");
  require_once ("controladores/usuarios.controlador.php");
  require_once ("controladores/buses.controlador.php");
  require_once ("controladores/destinos.controlador.php");
  require_once ("controladores/reservas.controlador.php");

 // require_once ("modelos/plantilla.modelo.php");
  require_once ("modelos/usuarios.modelo.php");
  require_once ("modelos/buses.modelo.php");
  require_once ("modelos/destinos.modelo.php");
  require_once ("modelos/reservas.modelo.php");

  $plantilla = new ControladorPlantilla();
  $plantilla -> ctrPlantilla();
  
