<?php
include(__DIR__ . "/../../../core/config.php");
//validar accesos rol
require(__DIR__ . "/../../../functions/sessions/functions.php");
//llamar a la viajes - reservas
require(__DIR__ . "/../../../classes/viajes/reservarClass.php");
$reservasClass = new reservarClass();

if(isset($_GET["id"])){
$id = $_GET["id"];
}else{
    header("Location: ./lista.php");
}
$reservas = $reservasClass->getReservasRecibos($id);

?>

<!DOCTYPE html>
<html lang="es">

<?php include(__DIR__ . "/../../templates/head.php"); ?>
<!-- custom css -->
<link href="<?php echo $root; ?>/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                                <div class="card-body" style="width: 100%;">

                                    <div class="invoice-box" style="width: 100%;">
                                        <table>
                                            <tr class="top">
                                                <td colspan="2">
                                                    <table>
                                                        <tr>
                                                            <td class="title">
                                                                <img src="<?php echo $root; ?>/assets/img/vuelo-en-avion.png" width="100px" alt="Company logo" />
                                                            </td>

                                                            <td>
                                                                Invoice #: <?php echo $reservas['idReserva'] ?><br />
                                                                Fecha Reserva: <?php echo $reservas['fechaModifica'] ?><br />

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr class="information">
                                                <td colspan="2">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                Agenvia Viajes.<br />
                                                                12345 Sunny Road<br />
                                                                Sunnyville, TX 12345
                                                            </td>

                                                            <td>
                                                                Acme Corp.<br />
                                                                CECN<br />
                                                                viajes@hotmail.com
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Fecha Llegada: <br />
                                                                <?php echo  $reservas['llegada'] ?>
                                                            </td>

                                                            <td>
                                                               Fecha Salida:<br />
                                                               <?php echo  $reservas['salida'] ?>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>

                                            <tr class="heading">
                                                <td>Item</td>

                                                <td>Precio</td>


                                            </tr>

                                            <tr class="item">
                                                <td style="width: 200px;"><?php echo "Hotel: " . $reservas['nombre'] ?></td>
                                                <td>$<?php echo $reservas['precio'] ?></td>
                                            </tr>

                                            <tr class="item">
                                                <td><?php echo "Destino: " . $reservas['destino'] ?></td>
                                            </tr>

                                            <tr class="item">
                                                <td><?php echo "Duracion: " . $reservas['duracion'] ?></td>
                                            </tr>

                                            <tr class="total">
                                                <td></td>

                                                <td>
                                                    Total: $<?php echo $reservas['precio'] ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <form action="./../../../functions/pdf/recibosReservas.php" method="GET">
                                            <input type="hidden" name="id" value="<?php echo $reservas['idReserva'] ?>">
                                            <button class="btn btn-info btn-circle" type="submit"><i class="fa-solid fa-print"></i></a></button>
                                        </form>
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
    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- customs js -->
    <script src="<?php echo $root; ?>/ajax/viajesAjax.js"></script>


</body>

</html>