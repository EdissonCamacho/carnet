<div class="container">
  <div class="row">
    <div class="col-lg-1">

    <img src="vista/imagenes/dependencia.png" class="imagenes" alt="" srcset="">



    </div>
    <div class="col-lg-11">


      <h2>Dependencia</h2>
      <p>Cree dependencias para asignador el personal a ellas.</p>

      <br>
      <br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDependencia">Crear Dependencia</button>




      <table id="tablaDependencia" class="table">
        <thead>
          <tr>
            <th>Nombre Dependencia</th>
            <th>Accciones</th>
          </tr>
        </thead>
        <tbody id="contenidoDependencia">


        </tbody>
      </table>






    </div>
  </div>


  <div class="container">


    <!-- Modal -->
    <div class="modal fade" id="modalDependencia" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Crear Dependencia</h4>
          </div>




          <div class="modal-body">
            <form>

              <div class="form-group">
                <label for="txtNombreDependencia">Nombre Dependencia</label>
                <input type="text" class="form-control" id="txtNombreDependencia">
              </div>



            </form>














          </div>






          <div class="modal-footer">
            <button id="btnCrearDependencia" type="button" class="btn btn-default" data-dismiss="modal">Guardar Dependencia</button>
          </div>
        </div>

      </div>
    </div>

  </div>




  <div class="container">


    <!-- Modal Modificar -->
    <div class="modal fade" id="modDependencia" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modificar Dependencia</h4>
          </div>




          <div class="modal-body">
            <form>

              <div class="form-group">
                <label for="txtModificarNombreDependencia">Nombre Dependencia</label>
                <input type="text" class="form-control" id="txtModificarNombreDependencia">
                <p id="nameMod"> </p>
              </div>



            </form>














          </div>






          <div class="modal-footer">
            <button id="btnModDependencia" type="button" class="btn btn-default" data-dismiss="modal">Modificar Dependencia</button>
          </div>
        </div>

      </div>
    </div>

  </div>