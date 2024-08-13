<?php headerAdmin($data); ?>
<main class="app-content">
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ingrese número de seguimiento</h3>
              </div>
              <div class="card-body">
                <div class="input-group mb-3">
                  <input type="search" id="ref_no" class="form-control" placeholder="Escriba el número de seguimiento aquí" onkeyup="mayus(this)" oninput="validarTracking(this)" onkeypress="return SoloLetrasYNumeros(event);">
                  <div class="input-group-append">
                    <button type="button" id="track-btn" onclick="rastreoPaquete();" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-4" id="resPaquete" hidden>
          <div class="label small-label"> <!-- Clase para el tamaño pequeño de la etiqueta -->
            <div class="header">
              <img src="<?= base_url(); ?>/Assets/images/logo.png" alt="Logo" class="logo">
            </div>
            <div class="details">
              <div id="n_recepcion" class="section-title">N° Recepción</div>
              <div class="value">D85307</div>
              <div class="double-column">
                <div class="column">
                  <div class="section-title">Peso Real</div>
                  <div id="Peso_paquete" class="value"></div>
                </div>
                <div class="column">
                  <div class="section-title">Peso Volumen</div>
                  <div id="Volumen_paquete" class="value"></div>
                </div>
              </div>
            </div>
            <div class="details">
              <div class="section-title">N° Tracking</div>
              <div class="value" id="Numero_Traking"></div>
            </div>
            <div class="details">
              <div class="section-title">Tipo de Envío</div>
              <div class="value" id="Cod_Tipo_Envio"></div>
            </div>
            <div class="details">
              <div class="section-title">Cliente</div>
              <div class="value" id="nombreCompleto"></div>
            </div>
            <div class="details">
              <div class="section-title">Dirección</div>
              <div class="value direccion" id="Direccion_Envio"></div>
            </div>
            <div class="row d-print-none mt-2" id="printBtn">
              <div class="col-12 text-right">
                <a class="btn btn-primary" href="javascript:window.print();"> Imprimir</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<?php footerAdmin($data); ?>

<script>
function SoloLetrasYNumeros(e) {
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toString();
    var caracteresPermitidos = " áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789."; // Incluye números
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

  function validarTracking(input) {
    var nombre = input.value;
    nombre = nombre.slice(0, 30);
    input.value = nombre;
  }
  </script>
<style>
  body {
    font-family: sans-serif;
  }

  .label {
    width: 3.5in;
    height: 5.5in;
    border: 1px solid black;
    padding: 10px;
    margin-bottom: 20px;
    background-color: white;
  }

  .small-label {
    width: 3in; /* Tamaño reducido para impresión */
    height: 5in; /* Tamaño reducido para impresión */
    font-size: 10px; /* Tamaño de fuente reducido para impresión */
  }

  .header {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    padding: 20px;
  }

  .logo {
    width: 200px;
    height: 50px;
    margin-right: 5px;
  }

  .section-title {
    font-size: 10px;
    font-weight: bold;
    margin-top: 5px;
    text-align: left; /* Alineación a la izquierda */
  }

  .details {
    font-size: 10px;
    margin-top: 5px;
    display: flex;
    flex-direction: column;
  }

  .value {
    font-weight: bold;
    display: inline-block;
    width: 100%;
    text-align: center;
    font-size: 24px;
    border-bottom: 1px solid black; /* Línea inferior para todos los valores */
    padding-bottom: 0px; /* Espacio entre valor y línea inferior */
    margin-bottom: -1px; /* Reducción del espacio entre título y valor */
  }

  /* Estilo específico para N° Recepción */
  #n_recepcion {
    border-top: 1px solid black; /* Añadir línea superior solo a N° Recepción */
    padding-top: 5px; /* Ajustar espacio superior para alinear con el borde */
    margin-top: -5px; /* Corregir el margen superior para alinear correctamente */
  }

  .double-column {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }

  .double-column .column {
    flex: 5;
    width: calc(50% - 0px);
    border: 1px solid black;
    padding: 5px;
    text-align: center;
  }

  .direccion {
    font-family: 'Courier New', Courier, monospace;
  }

  @media print {
    body * {
      visibility: hidden;
    }
    .label, .label * {
      visibility: visible;
    }
    .label {
      position: absolute;
      left: 0;
      top: 0;
      width: 35%;
      background-color: white;
      padding: 10px;
      border: none;
      margin: 0;
    }
  }
</style>
