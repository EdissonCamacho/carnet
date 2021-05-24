<div class="container">
  <div class="row">
    <div class="col-lg-1">

    <img src="vista/imagenes/rh.png" class="imagenes" alt="" srcset="">


    </div>
    <div class="col-lg-11">


      <h2>Rhesus (Rh)</h2>
      <p>Cree tipos de sangre para ser asignados segun personal.</p>


      <br>
      <br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRH">Crear RH</button>




      <table id="tablaRhP" class="table">
        <thead>
          <tr>
            <th>RH</th>
            <th>Accciones</th>
          </tr>
        </thead>
        <tbody id="tablaRh">


        </tbody>
      </table>






    </div>
  </div>


  <div class="container">


    <!-- Modal -->
    <div class="modal fade" id="modalRH" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Crear Rh</h4>
          </div>

          <div class="modal-body">
            <form>

              <div class="form-group">
                <label for="txtRhS">RH</label>
                <input type="text" class="form-control" id="txtRhS">
              </div>



            </form>



          </div>


          <div class="modal-footer">
            <button id="btnCrearRh" type="button" class="btn btn-default" data-dismiss="modal">Guardar Rh</button>
          </div>
        </div>

      </div>
    </div>

  </div>




  <div class="container">


    <!-- Modal Modificar -->
    <div class="modal fade" id="modalMrh" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modificar Rh</h4>
          </div>

          <div class="modal-body">
            <form>

              <div class="form-group">
                <label for="txtModR">RH</label>
                <input type="text" class="form-control" id="txtModR">
              </div>



            </form>



          </div>


          <div class="modal-footer">
            <button id="btnModificarRh" type="button" class="btn btn-default" data-dismiss="modal">Modificar Rh</button>
          </div>
        </div>

      </div>
    </div>

  </div>









  </body>

  </html>