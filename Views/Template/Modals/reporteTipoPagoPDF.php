<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td,
        table th {
            font-size: 14px; /* Aumentar el tamaño de la fuente */
            padding: 10px; /* Aumentar el padding para mayor legibilidad */
        }

        h2, h3, h4 {
            margin: 0;
            font-size: 18px; /* Tamaño de fuente para los encabezados */
        }

        h4 {
            margin-bottom: 5px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .wd33 {
            width: 33.33%;
        }

        .tbl-cliente {
            border: 1px solid #CCC;
            border-radius: 10px;
            padding: 10px; /* Ajustar padding */
        }

        .wd10 {
            width: 10%;
        }

        .wd15 {
            width: 15%;
        }

        .wd40 {
            width: 40%;
        }

        .wd55 {
            width: 55%;
        }

        .table-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .tbl-detalle {
            width: 80%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        .tbl-detalle thead th {
            background-color: #0D47A1;
            color: #FFF;
            font-size: 16px; /* Aumentar tamaño de fuente en el encabezado */
        }

        .tbl-detalle tbody td {
            border-bottom: 1px solid #CCC;
            text-align: center;
        }

        .tbl-detalle tfoot td {
            padding: 100px;
            text-align: center;
        }

        #footer {
            padding-top: 10px;
            border-top: 1px solid #CCC;
            width: 100%;
        }

        #footer .fila td {
            text-align: center;
            width: 100%;
        }

        #footer .fila td span {
            font-size: 12px;
            color: black;
        }

        .page-header {
            margin-bottom: 20px;
        }

        .logo_login {
            max-width: 150px; /* Aumentar el tamaño del logo */
        }

        .tbl-hader td {
            vertical-align: top;
        }

    </style>
</head>

<body>
    <table class="tbl-hader">
        <tbody>
            <tr>
                <td class="wd33">
                    <div class="col-6 text-center">
                        <h2 class="page-header"><img class="logo_login" src="<?= base_url(); ?>/Assets/images/logo1.jpeg"></h2>
                    </div>
                </td>
                <td class="text-center wd33">
                    <h4><strong><?= NOMBRE_EMPRESA ?></strong></h4>
                    <p><?= DIRECCION ?> <br>
                        Teléfono: <?= TELEMPRESA ?> <br>
                        Email: <?= EMAIL_EMPRESA  ?></p>
                    <h3><strong>Lista de Tipos de Pagos</strong></h3>
                </td>
                <td class="wd33">
                    <div class="col-6 text-right">
                        <p>Fecha: <?= date('d/m/Y | g:i:a') ?> <br></p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="tbl-detalle">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">Id</th>
                <th class="text-center" style="width: 400px;">Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 0;
            foreach ($data as $datos) {
                $contador += 1;
            ?>
                <tr>
                    <td class="text-center"><?= $contador ?></td>
                    <td class="text-center"><?= $datos['Descripcion_pago'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <page_footer>
        <table id="footer">
            <tr class="fila">
                <td>
                    <span>Traex - Página [[page_cu]] de [[page_nb]]</span>
                </td>
            </tr>
        </table>
    </page_footer>
</body>

</html>
