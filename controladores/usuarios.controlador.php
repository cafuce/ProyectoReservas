<?php
class ControladorUsuarios{
    public function ctrIngresoUsuarios(){
        if(isset($_POST["ingUsuario"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                var_dump($valor);
                var_dump($_POST["ingPassword"]);
                var_dump($respuesta);

                if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){
                    echo '<div class="alert alert-success"> Bienvenido</div>';

                    $_SESSION["iniciarsesion"] = "ok";

                    echo '<script>
                        window.location = "inicio";
                    </script>';
                }else{
                    echo '<div class="alert alert-danger"> Error al ingresar</div>';
                }
            }
        } 
    }
}