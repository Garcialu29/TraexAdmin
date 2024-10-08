<script>
      const base_url = "<?= base_url(); ?>";
    </script>
<!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <script src="<?= media(); ?>/js/fontawesome.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>

    <script type="text/javascript" src="<?= media(); ?>/js/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  
  <!-- Data table plugin-->
  <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/bootstrap-select.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

    <?php if($data['page_name'] == "Roles Usuario"){  ?>
    <script src="<?= base_url(); ?>/Assets/js/functions_roles.js"></script>
    <?php
    }?>
    <!--Validacion pagina usuarios-->
    <?php if($data['page_name'] == "usuarios"){  ?>
    <script src="<?= base_url(); ?>/Assets/js/functions_usuarios.js"></script> <!--llamado de funcion usuario-->
    <?php
    }?>   

  <?php if($data['page_name'] == "paquetes"){  ?>
    <script src="<?= base_url(); ?>/Assets/js/functions_paquetes.js"></script> 
    <?php
    }?> 

    <?php if($data['page_name'] == "Tipos de envio"){  ?>
    <script src="<?= base_url(); ?>/Assets/js/functions_TipoEnvios.js"></script> 
    <?php
    }?>


    <script type="text/javascript" src="<?= media(); ?>/js/functions_admin.js"></script>
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
  </body>
  
</html>