<?php
include(__DIR__ . "/../../core/config.php");
//validar accesos rol
require(__DIR__ . "/../../functions/sessions/functions.php");
//llamar a la viajes - reservas
require(__DIR__ . "/../../classes/viajes/reservarClass.php");


?>

<!DOCTYPE html>
<html lang="es">

<?php include(__DIR__ . "/../templates/head.php"); ?>
<!-- custom css -->
<link href="<?php echo $root; ?>/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include(__DIR__ . "/../templates/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(__DIR__ . "/../templates/header.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Mis Datos</h6>
                                </div>
                                <div class="card-body">

                                    <div class="container">
                                        <div class="main-body">

                                            <div class="row gutters-sm">
                                                <div class="col-md-4 mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="d-flex flex-column align-items-center text-center">
                                                                <img src="<?php echo $root; ?>/assets/img/man.png" alt="Admin" class="rounded-circle" width="150">
                                                                <div class="mt-3">
                                                                    <h5><?php echo $namesClientes; ?></h5>
                                                                    <p class="text-secondary mb-1"><?php echo $username; ?></p>
                                                                    <p class="text-muted font-size-sm"><?php echo $rolUsers; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card mb-3">
                                                        <div class="card-body">
                                                            <form id="formPerfil">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Primer Nombre</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input class="form-control" type="hidden" value="<?php echo $id; ?>" name="idUserEdit" readonly>
                                                                        <input class="form-control" value="<?php echo $firsName; ?>" type="text" name="firstNameEdit">
                                                                    </div>
                                                                </div>

                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Segundo Nombre</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input class="form-control" value="<?php echo $secodName; ?>" type="text" name="secondNameEdit">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Apellido Paterno</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input class="form-control" value="<?php echo $aPaterno; ?>" type="text" name="paternoEdit">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Apellido Materno</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input class="form-control" value="<?php echo $aMaternos; ?>" type="text" name="maternoEdit">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Telefonos</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input class="form-control" value="<?php echo $telf; ?>" type="text" name="telfEdit">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <button type="submit" class="btn btn-info">
                                                                            Guardar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <?php include(__DIR__ . "/../templates/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <?php include(__DIR__ . "/../templates/scripts.php"); ?>
    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- customs js -->
    <script src="<?php echo $root; ?>/ajax/perfilAjax.js"></script>


</body>

</html>