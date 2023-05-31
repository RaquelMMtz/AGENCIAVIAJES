<?php
include(__DIR__ . "/../../../core/config.php");
require(__DIR__ . "/../../../classes/viajes/reservarClass.php");
//validar accesos rol
require(__DIR__ . "/../../../functions/sessions/functions.php");
//llamar a la clase usuarios
$solicitudesClass = new reservarClass();
$id = $_SESSION["id_login"];
$solicitudes = $solicitudesClass->getSolicitudesClientes($id);

?>

<!DOCTYPE html>
<html lang="es">

<?php include(__DIR__ . "/../../templates/head.php"); ?>
<!-- custom css -->
<link href="<?php echo $root; ?>/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- css range fitler -->
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css">
<!-- css buttons export -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="./solicitar.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plane fa-sm text-white-50"></i>Enviar Nueva Solicitud</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Solicitudes de viajes enviadas</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">ID</th>
                                                    <th>Estado</th>
                                                    <th>Origen</th>
                                                    <th>Destino</th>
                                                    <th>Precio</th>
                                                    <th>Fecha Reserva</th>
                                                    <th>Acciones: </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($solicitudes as $data) : ?>
                                                    <tr class="edit-row">
                                                        <td class="id-viajes" style="display: none;"><?php echo $data["idViaje"]; ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($data["estatus"]) {
                                                                case 0:
                                                                    echo '<span class="badge badge-danger">Cancelado</span>';
                                                                    break;
                                                                case 1:
                                                                    echo '<span class="badge badge-success">Reservado</span>';
                                                                    break;
                                                                case 2:
                                                                    echo '<span class="badge badge-primary">Solicitado</span>';
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $data["origen"] ?></td>
                                                        <td><?php echo $data["destino"] ?></td>
                                                        <td><?php echo $data["precio"] ?></td>
                                                        <td><?php echo $data["fechaReserva"] ?></td>
                                                        <td>
                                                            <button class="btn btn-danger btn-circle btn-cancel"><i class="fa-solid fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo $root; ?>/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $root; ?>/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $root; ?>/js/demo/datatables-demo.js"></script>
    <!-- datatables ranger filter -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.4.1/js/dataTables.dateTime.min.js"></script>
    <!-- datatables buttons -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- customs js -->
    <script src="<?php echo $root; ?>/ajax/viajesAjax.js"></script>
   

</body>

</html>