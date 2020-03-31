<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar Usuarios
      <small>Panel de control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Usuarios</li>
    </ol>
  </section>

  <section class="content">
    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">
        <button type="button" class="btn btn-primary bnt-xs" data-toggle="modal" data-target="#modalAgragarUsuario">
          Agregar Usuario
        </button>
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas ">

          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Ultimo Login</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Matias Olivera</td>
              <td>Administrador</td>
              <td><img src="vistas/img/usuarios/default/anonymous.png" class=" img-thumbnail" width="30px"></td>
              <td>Otro Perfil</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td>27-03-2020</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger btn-xs"> <i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>

            <tr>
              <td>1</td>
              <td>Pedro Capozo</td>
              <td>User</td>
              <td><img src="vistas/img/usuarios/default/anonymous.png" class=" img-thumbnail" width="30px"></td>
              <td>Otro Perfil</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td>27-03-2020</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger btn-xs"> <i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>


            <tr>
              <td>1</td>
              <td>Matias Olivera</td>
              <td>Usuario</td>
              <td><img src="vistas/img/usuarios/default/anonymous.png" class=" img-thumbnail" width="30px"></td>
              <td>Otro Perfil</td>
              <td><button class="btn btn-danger btn-xs">Desactivado</button></td>
              <td>27-03-2020</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>
          </tbody>


        </table>
      </div>

      
    </div>
  </section>
</div>

<!--
=========================
  MODAL AGREGAR USUARIO
=========================-->

<div id="modalAgragarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>

        </div>
        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoPefil">
                  <option value="">Seleccionar Perfil</option>

                  <option value="Administrador"> Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>
                </select>

              </div>

            </div>

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" id="nuevafoto" name="nuevaFoto">

              <p class="help-block">Peso maximo de la foto 200 MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">

            </div>

          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Usuario</button>
        </div>

      </form>

    </div>

  </div>
</div>

