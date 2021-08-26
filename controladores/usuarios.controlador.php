<?php
class ControladorUsuarios{
    static public function ctrIngresoUsuarios(){
        if(isset($_POST["ingUsuario"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                //$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                /*var_dump($valor);
                var_dump($_POST["ingPassword"]);
                var_dump($respuesta);*/

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

    // Registro usuario
    static public function ctrCrearUsuario(){

        if(isset($_POST["nuevoUsuario"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                $tabla = "usuarios";

                //$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array(
                    "cod_usuario" => $_POST[""],
                    "nombres" => $_POST["nuevoNombre"],
                    "apellidos" => $_POST["nuevoApellido"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" => $_POST["nuevoPassword"],
                    "perfil" => $_POST["nuevoPerfil"]
                );

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if($respuesta == "ok"){
                    echo '<script> 
                    swal({
                        type: "success",
                        title: "El usuario ha sido guardado correctamente.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                    </script>';
                }

            }else{
                echo '<script> 
                    swal({
                        type: "error",
                        title: "El usuario no puede estar vacio o tener caracteres especiales.",
                        showConfirmButton: true,
                        confirmButtonText:  "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                </script>';
            }
        }
    }

    static public function ctrMostrarUsuarios($item, $valor){
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }
}