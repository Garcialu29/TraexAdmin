 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="./Assets/images/avatar.png" alt="User Image">
      <div>
      <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['Nombre']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['Nombre_Rol']; ?></p>
        </div>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= base_url(); ?>/inicio"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">clientes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>/clientes"><i class="icon fa fa-address-book"></i>Clientes</a></li>
          </ul>
        </li>
    
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-box"></i><span class="app-menu__label">Paquetes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>/paquetes"><i class="icon fa fa-archive"></i> Pedido</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>/rastreo"><i class="icon fa fa-map-marker"></i> Rastreo</a></li>
          
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-cog"></i><span class="app-menu__label">Mantenimiento Usuario</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
             <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-user"></i>Usuarios</a></li>
             <li><a class="treeview-item" href="<?= base_url(); ?>/tipoEnvios"><i class="fa fa-plane"></i>Tipo de envios</a></li>
             <li><a class="treeview-item" href="<?= base_url(); ?>/tipoPagos"><i class="fa fa-dollar-sign"> </i>Tipo de Pagos</a></li>
             <li><a class="treeview-item" href="<?= base_url(); ?>/tipoSeguros"><i class="fa fa-umbrella"> </i>Seguros</a></li>
             <li><a class="treeview-item" href="<?= base_url(); ?>/estadoEnvios"><i class="fa fa-clipboard-check"> </i>Estado de envio</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shield-alt"></i><span class="app-menu__label">Seguridad</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
             <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-user-shield"></i>Roles y Permisos</a></li>
             <li><a class="treeview-item" href="<?= base_url(); ?>/objetos"><i class="icon fa fa-desktop"></i>Objetos</a></li>
             <li><a class="treeview-item" href="<?= base_url(); ?>/parametros"><i class="icon fa fa-key"></i>Parametros</a></li>
          </ul>
        </li>
        
        <li>
        <a class="treeview-item" href="<?= base_url(); ?>/backupr"> <i class="icon fa fa-database"></i>Backup</a></li>
        <a class="treeview-item" href="<?= base_url(); ?>/restorer"> <i class="icon fa fa-window-restore" ></i> Restore</a></li>  
        <!--<a class="app-menu__item" href="<?= base_url(); ?>/Notificaciones"><i class="icon fa fa-bell"></i><span class="app-menu__label">Notificaciones</span></a></li>-->
          
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Cerrar sesión</span>
            </a>
        </li>
        
      </ul>
    </aside>