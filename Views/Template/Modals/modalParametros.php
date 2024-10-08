<!-- Modal -->
<div class="modal fade" id="ModalParametros" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
            <form id="formParametros" name="formParametros" class="form-horizontal">
            <input type="hidden" id="idParametro" name="idParametro" value="">

                  <p class="text-primary" id="letra">Todos los campos son obligatorios.</p> <br>

                  <div class="form-row">

                    <div class="form-group col-md-6">
                      <label for="txtNombreParametro" id="letra">Nombre</label>
                      <input type="text" class="form-control valid validText" id="txtNombreParametro" name="txtNombreParametro" onkeyup="mayus(this)" onkeypress="return SoloLetras(event);" oninput="validarLargo(this)" required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="txtNombreParametro" id="letra">Descripcion</label>
                      <input type="text" class="form-control valid validText" id="txtDescripcion" name="txtDescripcion"   onkeyup="mayus(this)" onkeypress="return SoloLetras(event);" oninput="validarLargo(this)" required="">
                    </div>
                  </div>

                  <div class="form-row">

                    <div class="form-group col-md-6">
                      <label for="txtValorParametro" id="letra">Valor del parametro</label>
                      <!--onkeypress="return controlTag(event);"-->
                      <input type="text" class="form-control valid validNumber" id="txtValorParametro" name="txtValorParametro" onkeyup="mayus(this)"  onkeypress="return SoloLetrasYNumeros(event);" oninput="validarLargo(this)" required="">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="txtCreacionParametro" id="letra">Fecha de creacion</label>
                      <input type="text" class="form-control" id="txtCreacionParametro" name="txtCreacionParametro" readonly required="" value="<?php echo(date("Y-m-d"));?>">
                    </div>

                  </div>

                  <div class="tile-footer">
                    <button id="btnActionForm" class="btn btn-primary" type="submit"><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-danger" id="boton" type="button" data-dismiss="modal">Cerrar</button>
                  </div>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript">
function validarLargo(input) {
    var nombre = input.value;
    nombre = nombre.slice(0, 100);
    input.value = nombre;
  }


  </script>

