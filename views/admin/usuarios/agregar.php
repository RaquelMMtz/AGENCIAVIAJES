<?php
include(__DIR__ . "/../../../core/config.php");
require(__DIR__ . "/../../../classes/usuarios/usuariosClass.php");
//validar accesos rol
require(__DIR__."/../../../functions/sessions/functions.php");
//llamar a la clase usuarios
$usersClass = new usuariosClass();
$users = $usersClass->getUsers();
?>

<!DOCTYPE html>
<html lang="es">

<?php include(__DIR__ . "/../../templates/head.php"); ?>
<!-- sweetaler -->
<link rel="stylesheet" href="<?php echo $root; ?>/assets/sweetAlert/sweetalert.css">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include(__DIR__ . "/../../templates/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(__DIR__ . "/../../templates/header.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Agregar</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Agregar Usuarios</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Registrar Usuarios - Clientes</h6>
                                </div>
                                <div class="card-body">
                                    <form class="form-validated" id="formUsuarios">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Primer Nombre</label>
                                                <input type="text" placeholder="ingresa los nombres" name="names" class="form-control" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Segundo Nombre</label>
                                                <input type="text" placeholder="ingresa los nombres" name="names-second" class="form-control" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Apellido Paterno</label>
                                                <input type="text" placeholder="ingresa el apellido paterno" class="form-control" name="paterno" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Apellido Materno</label>
                                                <input type="text" placeholder="ingresa el apellido materno" class="form-control" name="materno" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Usuario</label>
                                                <input type="text" class="form-control" name="users" placeholder="ingresa un usuario" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputPassword4">Password</label>
                                                <input type="password" placeholder="ingresa una contraseña" class="form-control" name="pass" id="inputPassword4">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputPassword4">Telefonos</label>
                                                <input type="number" name="telf" placeholder="ingresa un telefono" class="form-control" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputState">Rol Usuario</label>
                                                <select id="inputRol" name="rol" class="form-control">
                                                    <option selected>Seleccionar...</option>
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Clientes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- muestra campos adicionales si es clientes -->
                                        <div id="addressFieldContainer"></div>

                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a class="btn btn-dark" href="./lista.php">Cancelar</a>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(__DIR__ . "/../../templates/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <?php include(__DIR__ . "/../../templates/scripts.php"); ?>
    <!-- datatables -->
    <script src="<?php echo $root; ?>/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $root; ?>/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $root; ?>/js/demo/datatables-demo.js"></script>
    <script src="<?php echo $root; ?>/js/functions/usuarios.js"></script>
    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- custom functions -->
    <script src="<?php echo $root; ?>/js/validateForms.js"></script>
    <script src="<?php echo $root; ?>/ajax/usuariosAjax.js"></script>

</body>

</html>