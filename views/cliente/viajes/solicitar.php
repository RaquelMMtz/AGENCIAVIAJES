<?php
include(__DIR__ . "/../../../core/config.php");
//require(__DIR__ . "/../../../classes/usuarios/usuariosClass.php");
//validar accesos rol
require(__DIR__ . "/../../../functions/sessions/functions.php");
//llamar a la clase usuarios
require_once(__DIR__ . "/../../../classes/viajes/viajesClass.php");
$viajesClass = new viajesClass();
$destinos = $viajesClass->getViajes();
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
        <?php include(__DIR__ . "/../../templates/sidebarClientes.php"); ?>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Destinos</h6>
                                </div>
                                <div class="card-body">
                                    <div class="destinos-container">
                                        <?php if (!empty($destinos)) : ?>
                                            <?php foreach ($destinos as $data) : ?>
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><?= $data["destino"]; ?></h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <img class="img-viajes" src="<?php echo $root . "/uploads/viajes/" . $data["img"]; ?>" alt="">
                                                        <div class="mt-2">
                                                            <?= substr($data["descripcion"], 0, 150) . '...' ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer card-footer-details">
                                                        <div>
                                                            <b><?= $data["precioDestino"]; ?></b>
                                                        </div>
                                                        <div>
                                                            <a href="<?php echo $root . "/views/cliente/viajes/reservar.php?id=" . $data["idDestino"]; ?>" class="btn btn-success btn-circle btn-sm">
                                                                <i class="fas fa-shop"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <p>No existen datos</p>
                                        <?php endif; ?>
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