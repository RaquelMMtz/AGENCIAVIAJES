<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $root; ?>/views/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-plane"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Agencia de Viajes</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo $root; ?>/views/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/usuarios/agregar.php">Agregar Usuarios</a>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/usuarios/lista.php">Lista Usuarios</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-users"></i>
            <span>Clientes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/clientes/lista.php">Lista Clientes</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseViajes" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-plane"></i>
            <span>Destinos</span>
        </a>
        <div id="collapseViajes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/viajes/agregar.php">Agregar Destinos</a>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/viajes/lista.php">Lista Destinos</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHoteles" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-hotel"></i>
            <span>Hoteles</span>
        </a>
        <div id="collapseHoteles" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/hoteles/agregar.php">Agregar Hoteles</a>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/hoteles/lista.php">Lista Hoteles</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServicios" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa-solid fa-taxi"></i>
            <span>Servicios</span>
        </a>
        <div id="collapseServicios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/servicios/agregar.php">Agregar Servicios</a>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/servicios/lista.php">Lista Servicios</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSolicitudes" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa-solid fa-share-from-square"></i>
            <span>Solicitudes</span>
        </a>
        <div id="collapseSolicitudes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo $root; ?>/views/admin/viajesSolicitudes/lista.php">Ver Solicitudes</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        PerFil
    </div>


    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $root; ?>/views/admin/perfil.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Ver Perfil</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>