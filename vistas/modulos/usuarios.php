
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar usuarios
        <small>Estamos en tus destino</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="#">Inicio</a></li>
        <li class="active">Inicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar usuario</button>          
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped tablas">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Nombre</th>
                <th>apellido</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

              <?php 
                $item = null;
                $valor = null;
                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                //var_dump($usuarios);
                foreach($usuarios as $key => $value){
                echo '
                <tr>
                  <td style="width:10px">1</td>
                  <td>'.$value["nombres"].'</td>
                  <td>'.$value["apellidos"].'</td>
                  <td>'.$value["usuario"].'</td>
                  <td>'.$value["perfil"].'</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>
                </tr>';
                }
              ?>
              
            </tbody>            
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Pie
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" >
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar usuario</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input.lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input.lg" name="nuevoApellido" placeholder="Ingresar Apellido" required>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="text" class="form-control input.lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="password" class="form-control input.lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="nuevoPerfil" >
                  <option value="Administrador">Administrador</option>
                  <option value="Cajero">Cajero</option>
                  <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" >Guardar</button>
        </div>
         
        <?php 
          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();
        ?>

      </form>

    </div>
  </div>
</div>  