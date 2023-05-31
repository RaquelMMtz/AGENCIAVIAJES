<?php
include(__DIR__ . "/../../../core/config.php");
//validar accesos rol
require(__DIR__ . "/../../../functions/sessions/functions.php");
//llamar a la clase servicios
require(__DIR__ . "/../../../classes/servicios/serviciosClass.php");
$serviciosClass = new serviciosClass();
$servicios = $serviciosClass->getHoteles();

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
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Registrar Servicios Relacionados Hoteles</h6>
                                </div>
                                <div class="card-body">
                                    <form class="form-validated" id="formServicios" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Nombre Servicio</label>
                                                <input type="text" placeholder="ingresa el nombre del servicio" name="namesServices" class="form-control" id="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Descripcion Servicio</label>
                                                <textarea class="form-control" name="descriptionServices" id="" cols="30" rows="5"></textarea>
                                            </div>

                                        </div>
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

    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- custom functions -->
    <script src="<?php echo $root; ?>/js/validateForms.js"></script>
    <script src="<?php echo $root; ?>/ajax/serviciosAjax.js"></script>


</body>

</html>