<!-- Modal -->
<div class="modal fade" id="modalFormTipoSeguro" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Tipo de Seguro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formTipoSeguro" name="formTipoSeguro">
              <input type="hidden" id="Id_Tipos_Seguros" name="Id_Tipos_Seguros" value="">

              <!-- Descripción -->
              <div class="form-group">
                <label class="control-label">Descripción</label>
                <input class="form-control" id="txtDescripcion" name="txtDescripcion" type="text" placeholder="Descripción del tipo de seguro" onkeyup="mayus(this)" onkeypress="return SoloLetras(event);" oninput="validarNombre(this)" required>
              </div>

              <!-- Precio -->
              <div class="form-group">
                <label class="control-label">Precio</label>
                <input class="form-control" id="txtPrecio" name="txtPrecio" type="number" step="0.01" placeholder="Precio del seguro" onkeypress="return SoloNumeros(event);" oninput="validarPrecio(this)" required>
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
    var letras = " áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ.";
    var especiales = [8, 13, 37, 39, 46]; // Códigos de teclas especiales (Backspace, Enter, Flechas, Supr)

    var tecla_especial = false;
    for (var i = 0; i < especiales.length; i++) {
      if (key === especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) === -1 && !tecla_especial) {
      return false; // Impedir la entrada si no es letra ni tecla especial
    }
  }

  function SoloNumeros(e) {
    var key = e.keyCode || e.which;
    if (key >= 48 && key <= 57) { // Solo números del 0 al 9
      return true;
    } else {
      return false; // Impedir la entrada si no es número
    }
  }

  function mayus(e) {
    e.value = e.value.toUpperCase();
  }

  function validarNombre(input) {
    var nombre = input.value;
    nombre = nombre.slice(0, 45);
    input.value = nombre;
  }
  function validarPrecio(input) {
    var nombre = input.value;
    nombre = nombre.slice(0, 10);
    input.value = nombre;
  }

</script>
