<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
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
              <form id="formRol" name="formRol">
                <input type="hidden" id="idRol" name="idRol" value="">
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del rol" onkeypress="return SoloLetras(event);" onkeyup="mayus(this)" oninput="validarLonR(this)" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Descripción</label>
                  <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del rol" onkeypress="return SoloLetras(event);" onkeyup="mayus(this)" oninput="validarLonR(this)" required=""></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Estado</label>
                    <select class="form-control" id="listStatus" name="listStatus" required="">
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
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

<script>
function SoloLetras(e) {
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toString();
    var caracteresPermitidos = " áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ."; // Incluye números
    var especiales = [8, 13, 37, 39, 46]; // Códigos de teclas especiales (Backspace, Enter, Flechas, Supr)

    var tecla_especial = false;
    for (var i = 0; i < especiales.length; i++) {
      if (key === especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (caracteresPermitidos.indexOf(tecla) === -1 && !tecla_especial) {
      return false; // Impedir la entrada si no es letra, número, o tecla especial
    }
}

function mayus(e) {
    e.value = e.value.toUpperCase();
  }

  function validarLonR(input) {
    var nombre = input.value;
    nombre = nombre.slice(0, 50);
    input.value = nombre;
  }
</script>