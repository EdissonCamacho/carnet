<div class="container">
  <div class="row">
    <div class="col-lg-1">

      <img src="vista/imagenes/usuario.png" class="imagenes" alt="" srcset="">



    </div>
    <div class="col-lg-11">

      <h2>Usuarios</h2>
      <p>Encontrara el listado de personas y prodrá realizar procesos dinamicos.</p>

      <br>
      <br>
      <button id="btn-CrearUsuario" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Crear Usuario</button>







      <table id="tablaPusuarios" class="table">
        <thead>
          <tr>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Url</th>
            <th>Dependencia</th>
            <th>Rh</th>
            <th>Acciones</th>

          </tr>
        </thead>
        <tbody id="contenidoTablaUsuarios">


        </tbody>
      </table>






    </div>
  </div>


  <div class="container">


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Crear Usuario</h4>
          </div>




          <div class="modal-body">
            <form>

              <div class="form-group">
                <label for="txtDocumento">Numero Documento:</label>
                <input type="text" class="form-control" id="txtDocumento">
              </div>
              <div class="form-group">
                <label for="txtNombres">Nombres:</label>
                <input type="text" class="form-control" id="txtNombres">
              </div>
              <div class="form-group">
                <label for="txtApellidos">Apellidos:</label>
                <input type="text" class="form-control" id="txtApellidos">
              </div>
              <div class="form-group">
                <label for="txtDireccion">Direccion:</label>
                <input type="text" class="form-control" id="txtDireccion">
              </div>

              <div class="form-group">
                <label for="txtTelefono">Telefono:</label>
                <input type="text" class="form-control" id="txtTelefono">
              </div>
              <div class="form-group">
                <label for="txtUrl">Url:</label>
                <input type="text" class="form-control" id="txtUrl">
              </div>
              <div class="form-group">
                <label for="txtDependencia">Dependencia:</label>
                <select class="form-control" id="listD">


                </select>
              </div>

              <div class="form-group">
                <label>Rh:</label>
                <select class="form-control" id="sel1">

                  <p id="cargar"></p>
                </select>


              </div>

            </form>














          </div>






          <div class="modal-footer">
            <button id="btnGuardar" type="button" class="btn btn-default" data-dismiss="modal">Guardar</button>
          </div>
        </div>

      </div>
    </div>

  </div>




  <div class="container">


    <!-- Modal Modificar -->
    <div class="modal fade" id="ModalModUsuarios" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modificar Usuario</h4>
          </div>




          <div class="modal-body">
            <form>

              <div class="form-group">
                <label for="txtDocumentoMod">Numero Documento:</label>
                <input type="text" class="form-control" id="txtDocumentoMod">
              </div>
              <div class="form-group">
                <label for="txtNombresMod">Nombres:</label>
                <input type="text" class="form-control" id="txtNombresMod">
              </div>
              <div class="form-group">
                <label for="txtApellidosMod">Apellidos:</label>
                <input type="text" class="form-control" id="txtApellidosMod">
              </div>
              <div class="form-group">
                <label for="txtDireccionMod">Direccion:</label>
                <input type="text" class="form-control" id="txtDireccionMod">
              </div>

              <div class="form-group">
                <label for="txtTelefonoMod">Telefono:</label>
                <input type="text" class="form-control" id="txtTelefonoMod">
              </div>
              <div class="form-group">
                <label for="txtUrlMod">Url:</label>
                <input type="text" class="form-control" id="txtUrlMod">
              </div>
              <div class="form-group">
                <label for="txtDependenciaMod">Dependencia:</label>
                <select class="form-control" id="selectModDependencia">


                </select>
              </div>

              <div class="form-group">
                <label>Rh:</label>
                <select class="form-control" id="rhMod">
                  <div id="ci"></div>

                </select>


              </div>

            </form>














          </div>






          <div class="modal-footer">
            <button id="btnModificarUsuario" type="button" class="btn btn-default" data-dismiss="modal">Guardar</button>
          </div>
        </div>

      </div>
    </div>

  </div>