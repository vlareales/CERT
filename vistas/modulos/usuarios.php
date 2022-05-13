<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
         <button class= "btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
           Agregar Usuario
         </button>

      </div> 
      <div class="box-body">
          <table class="table table-bordered table-striped tablas">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Último Login</th>
                <th>Acciones</th>
              </tr>
            </thead>

          <tbody>

          <?php 

          $item = null;
          $valor = null; 

          $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

          foreach ($usuarios as $key => $value){

          echo ' <tr>
                <td>1</td>
                <td>'.$value["nombre"].'</td>
                <td>'.$value["usuario"].'</td>
                <td>'.$value["perfil"].'</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>'.$value["ultimo_login"].'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarUsuario" idUsuario=" '.$value["id"].'" data-toggle="modal" data_target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>';
          }


          ?>
              
             
            </tbody>
          </table>
      </div>
        
    </div>
   
  </section>
 </div>
 <!-- MODAL AGREGAR USUARIO -->

 <div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
    <form role="form" method="post">
        <div class="modal-header" style="background:#00a65a
  ; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <!-- Entrada para el nombre -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
              </div>
            </div>
            <!-- Entrada para el usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>
              </div>
            </div>
            <!-- Entrada para contraseña -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
              </div>
            </div>
            <!-- Entrada para selecionar perfil -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="nuevoPerfil">
                  <option value=""> Selecionar Perfil</option>
                  <option value="Administrador"> Administrador</option>
                  <option value="Coordinador"> Coordinador</option>
                  <option value="Secretario"> Secretario</option>

                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class=" btn btn-primary"> Guardar Usuario</button>
        </div>

        <?php 

        
            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrCrearUsuario();
         ?>


  </form>      
  </div>

  </div>
</div>

<!-- MODAL EDITAR USUARIO -->

 <div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
    <form role="form" method="post">
        <div class="modal-header" style="background:#00a65a
  ; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Usuario</h4>
        </div>

    <!-- CUERPO MODAL -->
        <div class="modal-body">
          <div class="box-body">

   <!-- Entrada para el nombre -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
              </div>
            </div>
    <!-- Entrada para el usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" required>
              </div>
            </div>
    <!-- Entrada para contraseña -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva Contraseña" required>
              </div>
            </div>
    <!-- Entrada para selecionar perfil -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="editarPerfil">
                  <option value="" id="editarPerfil"></option>
                  <option value="Administrador"> Administrador</option>
                  <option value="Coordinador"> Coordinador</option>
                  <option value="Secretario"> Secretario</option>

                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class=" btn btn-primary"> Modificar Usuario</button>
        </div>

       <!--  <?php 

        
            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrCrearUsuario();
         ?> -->


  </form>      
  </div>

  </div>
</div>
